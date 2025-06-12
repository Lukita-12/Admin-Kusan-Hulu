<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AktaKematian;
use App\Models\Penduduk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Browsershot\Browsershot;

class AktaKematianController extends Controller
{
   public function index(Request $request)
{
    $role = Auth::user()->role;

    // Buat query dasar dengan relasi penduduk
    $query = AktaKematian::with('dataPenduduk');

    // Filter berdasarkan role
    if ($role === 'super_admin') {
        $query->whereIn('status', ['Diproses', 'Selesai']);
    } elseif ($role === 'admin') {
        $query->whereIn('status', ['Diajukan', 'Ditolak','Diproses', 'Selesai']);
    }

    // Tambahkan pencarian jika ada
    if ($request->filled('search')) {
        $query->whereHas('penduduk', function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%');
        });
    }

    // Tambahkan filter status dari dropdown jika valid sesuai role
    $allowedStatus = $role === 'super_admin'
        ? ['Diproses', 'Selesai']
        : ['Diajukan', 'Ditolak'];

    if ($request->filled('status') && in_array($request->status, $allowedStatus)) {
        $query->where('status', $request->status);
    }

    // Ambil hasil query
    // Urutkan: Status Diajukan → Diproses → lainnya, lalu created_at (terlama ke terbaru)
    $query->orderByRaw("
        FIELD(status, 'Diajukan', 'Diproses', 'Ditolak', 'Selesai')
    ")->orderBy('created_at', 'asc');

    $aktaKematians = $query->simplePaginate(6);


    return view('admin.akta_kematian.index', compact('aktaKematians'));
}



    public function create()
    {
        $penduduks = Penduduk::with('kartukeluarga')->latest()->get();

        return view('/admin.akta_kematian.create', [
            'penduduks' => $penduduks,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penduduk_id'       => ['required', 'exists:penduduk,id'],
            'tanggal'           => ['required', 'date'],
            'tanggal_meninggal' => ['required'],
            'tempat_meninggal'  => ['required'],
            'penyebab_meninggal'=> ['required'],
        ]);
        
        AktaKematian::create($validatedData);

        return redirect('/admin/akta-kematian');
    }

    /**
     * Display the specified resource.
     */
    public function show(AktaKematian $aktaKematian)
    {
        //
    }

    public function edit(AktaKematian $aktaKematian)
    {
        $penduduks = Penduduk::with('kartukeluarga')->latest()->get();

        return view('admin.akta_kematian.edit', [
            'aktaKematian'  => $aktaKematian,
            'penduduks'      => $penduduks,
        ]);
    }

    public function update(Request $request, AktaKematian $aktaKematian)
    {
        $validatedData = $request->validate([
            'penduduk_id'       => ['required', 'exists:penduduk,id'],
            'tanggal'           => ['required', 'date'],
            'tanggal_meninggal' => ['required'],
            'tempat_meninggal'  => ['required'],
            'penyebab_meninggal'=> ['required'],
        ]);

        $aktaKematian->update($validatedData);

        return redirect('/admin/akta-kematian');
    }

    public function destroy(AktaKematian $aktaKematian)
    {
        $aktaKematian->delete();

        return redirect('/admin/akta-kematian');
    }

    // Search
    public function search(Request $request)
    {
        $aktaKematians = AktaKematian::search($request->search)->latest()->simplePaginate(6);

        return view('admin.akta_kematian.index', [
            'aktaKematians' => $aktaKematians,
        ]);
    }

    // Filter
    public function filter(Request $request)
    {   
        $status = $request->status;

        $aktaKematians = $status
            ? AktaKematian::filterByStatus($status)->latest()->simplePaginate(6)
            : AktaKematian::with('penduduk.kartukeluarga')->latest()->simplePaginate(6);

        return view('admin.akta_kematian.index', [
            'aktaKematians' => $aktaKematians,
        ]);
    }

    // Action
    public function accept(AktaKematian $aktaKematian)
    {
        $aktaKematian->status = 'Diproses';
        $aktaKematian->save();

        return redirect('/admin/akta-kematian');
    }

    public function reject(AktaKematian $aktaKematian)
    {
        $aktaKematian->status = 'Ditolak';
        $aktaKematian->save();

        return redirect('/admin/akta-kematian');
    }
    public function complete(AktaKematian $aktaKematian)
{
    // Ubah status menjadi 'selesai'
    $aktaKematian->status = 'Selesai';
    $aktaKematian->save();

    // Redirect langsung ke halaman surat berdasarkan ID
    return redirect()->route('akta_kematian.surat', $aktaKematian->id);
}

 public function print(Request $request)
    {   // Validasi input tanggal
    $request->validate([
        'start_date' => 'required|date_format:Y-m-d',
        'end_date' => 'required|date_format:Y-m-d',
    ]);

    // Parsing tanggal
    $startDate = Carbon::parse($request->start_date)->format('Y-m-d');
    $endDate = Carbon::parse($request->end_date)->format('Y-m-d');

    // Tentukan status berdasarkan role user
    $user = Auth::user();
    if ($user->role === 'admin') {
        $status = ['Diajukan', 'Ditolak', 'Diproses', 'Selesai'];
    } elseif ($user->role === 'super_admin') {
        $status = ['Diproses', 'Selesai'];
    } else {
        $status = []; // Kosongkan jika role tidak dikenali
    }

    // Query data Akta Kematian berdasarkan tanggal dan status
    $aktaKematian = AktaKematian::with('dataPenduduk')
        ->whereBetween('tanggal', [$startDate, $endDate])
        ->whereIn('status', $status)
        ->get();

    // Buat view HTML
    $html = view('admin.akta_kematian.print', compact('aktaKematian', 'startDate', 'endDate'))->render();

    // Generate PDF menggunakan Browsershot
    return response()->streamDownload(function () use ($html) {
        echo Browsershot::html($html)
            ->format('A4')
            ->margins(10, 10, 10, 10)
            ->pdf();
    }, 'akta_kematian_' . date('Ymd') . '.pdf');

    }


}