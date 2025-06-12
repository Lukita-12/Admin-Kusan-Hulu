<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DomisiliPenduduk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Spatie\Browsershot\Browsershot;

use function Pest\Laravel\delete;

class DomisiliPendudukController extends Controller
{
    public function index(Request $request)
{
    $role = Auth::user()->role;

    // Query dasar dengan relasi penduduk dan kartu keluarga
    $query = DomisiliPenduduk::with(['penduduk.kartukeluarga', 'dataPenduduk']);

    // Filter berdasarkan role
    if ($role === 'super_admin') {
        $query->whereIn('status', ['Diproses', 'Selesai']);
    } elseif ($role === 'admin') {
        $query->whereIn('status', ['Diajukan', 'Ditolak','Diproses', 'Selesai']);
    }

    // Pencarian nama penduduk
    if ($request->filled('search')) {
        $query->whereHas('penduduk', function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%');
        });
    }

    // Filter status dropdown (sesuai role)
    $allowedStatus = $role === 'super_admin'
        ? ['Diproses', 'Selesai']
        : ['Diajukan', 'Ditolak'];

    if ($request->filled('status') && in_array($request->status, $allowedStatus)) {
        $query->where('status', $request->status);
    }

    $query->orderByRaw("
    FIELD(status, 'Diajukan', 'Diproses', 'Ditolak', 'Selesai')
    ")->orderBy('created_at', 'asc');
    // Ambil hasil query
    $domisiliPenduduks = $query->simplePaginate(6);

    return view('admin.domisili_penduduk.index', [
        'domisiliPenduduks' => $domisiliPenduduks,
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DomisiliPenduduk $domisiliPenduduk)
    {
        //
    }

    public function edit(DomisiliPenduduk $domisiliPenduduk)
    {
        return view('admin.domisili_penduduk.edit', [
            'domisiliPenduduk' => $domisiliPenduduk,
        ]);
    }

    public function update(Request $request, DomisiliPenduduk $domisiliPenduduk)
    {
        $validatedData = $request->validate([
            'nomor_surat'       => ['required', 'string', 'max:255', Rule::unique('domisili_penduduk', 'nomor_surat')->ignore($domisiliPenduduk->id)],
            'tanggal_pengajuan' => ['required', 'date'],
            'status'            => ['required', 'in:Diajukan,Ditolak,Diterima,Selesai'],
        ]);

        $domisiliPenduduk->update($validatedData);

        return('admin/domisili-penduduk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DomisiliPenduduk $domisiliPenduduk)
    {
       $domisiliPenduduk -> delete();

       return redirect() -> route('admin.domisili_penduduk.index');
    }

    // Search
    public function search(Request $request)
    {
        $domisiliPenduduks = DomisiliPenduduk::search($request->search)->latest()->simplePaginate(6);

        return view('admin.domisili_penduduk.index', [
            'domisiliPenduduks' => $domisiliPenduduks,
        ]);
    }

    // Filter
    public function filter(Request $request)
    {   
        $status = $request->status;

        $domisiliPenduduks = $status
            ? DomisiliPenduduk::filterByStatus($status)->latest()->simplePaginate(6)
            : DomisiliPenduduk::with('penduduk.kartukeluarga')->latest()->simplePaginate(6);

        return view('admin.domisili_penduduk.index', [
            'domisiliPenduduks' => $domisiliPenduduks,
        ]);
    }

    // Action
    public function accept(DomisiliPenduduk $domisiliPenduduk)
    {
        $domisiliPenduduk->status = 'Diproses';
        $domisiliPenduduk->save();

        return redirect('/admin/domisili-penduduk');
    }

    public function reject(DomisiliPenduduk $domisiliPenduduk)
    {
        $domisiliPenduduk->status = 'Ditolak';
        $domisiliPenduduk->save();

        return redirect('/admin/domisili-penduduk');
    }

    public function complete(DomisiliPenduduk $domisiliPenduduk)
    {
        $domisiliPenduduk->status = 'Selesai';
        $domisiliPenduduk->save();

        return redirect()->route('domisili-penduduk.surat', $domisiliPenduduk->id);
    }

    public function print(Request $request)
    {// Validasi input date (format Y-m-d karena <input type="date">)
    // Validasi input date
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
        $status = []; // default kosong jika role tidak dikenali
    }

    // Query data domisili penduduk
    $domisiliPenduduk = DomisiliPenduduk::with('dataPenduduk')
        ->whereBetween('tanggal', [$startDate, $endDate])
        ->whereIn('status', $status)
        ->get();

    // Buat view HTML
    $html = view('admin.domisili_penduduk.print', compact('domisiliPenduduk', 'startDate', 'endDate'))->render();

    // Generate PDF dengan Browsershot
    return response()->streamDownload(function () use ($html) {
        echo Browsershot::html($html)
            ->format('A4')
            ->margins(10, 10, 10, 10)
            ->pdf();
    }, 'domisili_penduduk_' . date('Ymd') . '.pdf');
    }
}
