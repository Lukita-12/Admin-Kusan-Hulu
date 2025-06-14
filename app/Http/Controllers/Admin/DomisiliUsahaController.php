<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataPenduduk;
use App\Models\DomisiliUsaha;
use App\Models\Penduduk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Browsershot\Browsershot;

class DomisiliUsahaController extends Controller
{
    public function index(Request $request)
{
    $role = Auth::user()->role;

    // Query dasar dengan relasi penduduk
    $query = DomisiliUsaha::with('dataPenduduk');

    // Filter berdasarkan role
    if ($role === 'super_admin') {
        $query->whereIn('status', ['Diproses', 'Selesai']);
    } elseif ($role === 'admin') {
        $query->whereIn('status', ['Diajukan', 'Ditolak','Diproses', 'Selesai']);
    }

    // Pencarian berdasarkan nama penduduk
    if ($request->filled('search')) {
        $query->whereHas('penduduk', function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%');
        });
    }

    // Filter status (sesuai dengan status yang diizinkan per role)
    $allowedStatus = $role === 'super_admin'
        ? ['Diproses', 'Selesai']
        : ['Diajukan', 'Ditolak'];

    if ($request->filled('status') && in_array($request->status, $allowedStatus)) {
        $query->where('status', $request->status);
    }


    $query->orderByRaw("
    FIELD(status, 'Diajukan', 'Diproses', 'Ditolak', 'Selesai')
    ")->orderBy('created_at', 'asc');

    // Eksekusi query dengan pagination
    $domisiliUsahas = $query->simplePaginate(6);

    return view('admin.domisili_usaha.index', [
        'domisiliUsahas' => $domisiliUsahas,
    ]);

    
}


    public function create()
    {
        $penduduks = Penduduk::with('kartukeluarga')->latest()->get();

        return view('/admin/domisili_usaha.create', [
            'penduduks' => $penduduks,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penduduk_id'   => ['required', 'exists:penduduk,id'],
            'tanggal'       => ['required', 'date'],
            'nama_usaha'    => ['required'],
            'jenis_usaha'   => ['required'],
            'alamat_usaha'  => ['required'],
        ]);

        DomisiliUsaha::create($validatedData);

        return redirect('/admin/domisili-usaha');
    }

    /**
     * Display the specified resource.
     */
    public function show(DomisiliUsaha $domisiliUsaha)
    {
        dd('You hit it right Show!');
    }

    public function edit(DomisiliUsaha $domisiliUsaha)
    {
        $penduduks = Penduduk::with('kartukeluarga')->latest()->get();

        return view('/admin/domisili_usaha.edit', [
            'domisiliUsaha' => $domisiliUsaha,
            'penduduks' => $penduduks,
        ]);
    }

    public function update(Request $request, DomisiliUsaha $domisiliUsaha)
    {
        $validatedData = $request->validate([
            'penduduk_id'   => ['required', 'exists:penduduk,id'],
            'tanggal'       => ['required', 'date'],
            'nama_usaha'    => ['required'],
            'jenis_usaha'   => ['required'],
            'alamat_usaha'  => ['required'],
        ]);
        
        $domisiliUsaha->update($validatedData);

        return redirect('/admin/domisili-usaha');
    }

    public function destroy(DomisiliUsaha $domisiliUsaha)
    {
        $domisiliUsaha->delete();

        return redirect('/admin/domisili-usaha');
    }

    // Search
    public function search(Request $request)
    {
        $domisiliUsahas = DomisiliUsaha::search($request->search)->latest()->simplePaginate(6);

        return view('admin.domisili_usaha.index', [
            'domisiliUsahas' => $domisiliUsahas,
        ]);
    }

    // Filter
    public function filter(Request $request)
    {   
        $status = $request->status;

        $domisiliUsahas = $status
            ? DomisiliUsaha::filterByStatus($status)->latest()->simplePaginate(6)
            : DomisiliUsaha::with('penduduk.kartukeluarga')->latest()->simplePaginate(6);

        return view('admin.domisili_usaha.index', [
            'domisiliUsahas' => $domisiliUsahas,
        ]);
    }

    public function accept(DomisiliUsaha $domisiliUsaha)
    {
        $domisiliUsaha->status = 'Diproses';
        $domisiliUsaha->save();

        return redirect('/admin/domisili-usaha');
    }

    public function reject(DomisiliUsaha $domisiliUsaha)
    {
        $domisiliUsaha->status = 'Ditolak';
        $domisiliUsaha->save();

        return redirect('/admin/domisili-usaha');
    }

    public function complete(DomisiliUsaha $domisiliUsaha)
    {
        $domisiliUsaha->status = 'Selesai';
        $domisiliUsaha->save();

        return redirect()->route('domisili-usaha.surat', $domisiliUsaha->id);
    }

    public function preview()
    {
        $domisiliUsaha = DomisiliUsaha::with('dataPenduduk')->get();
        
        return view('admin.domisili_usaha.print', [
        'domisiliUsaha' => $domisiliUsaha,
    ]);
    }

    public function print(Request $request)
    {   // Validasi input date (format Y-m-d karena <input type="date">)
        // Validasi input date (format Y-m-d karena <input type="date">)
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
        $status = []; // atau bisa lempar error jika role tidak dikenali
    }

    // Ambil data sesuai range tanggal dan status yang sesuai role
    $domisiliUsaha = DomisiliUsaha::with('dataPenduduk')
        ->whereBetween('tanggal', [$startDate, $endDate])
        ->whereIn('status', $status)
        ->get();

    // Buat view HTML
    $html = view('admin.domisili_usaha.print', compact('domisiliUsaha', 'startDate', 'endDate'))->render();

    // Generate PDF pakai Browsershot
    return response()->streamDownload(function () use ($html) {
        echo Browsershot::html($html)
            ->format('A4')
            ->margins(10, 10, 10, 10)
            ->pdf();
    }, 'domisili_usaha_' . date('Ymd') . '.pdf');}
}