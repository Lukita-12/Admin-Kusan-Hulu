<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kartukeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KartukeluargaController extends Controller
{
    public function index(Request $request)
{
    $role = Auth::user()->role;

    // Query dasar dengan relasi penduduk
    $query = Kartukeluarga::with('penduduk');

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

    // Filter status dari dropdown (dalam batas role yang valid)
    $allowedStatus = $role === 'super_admin'
        ? ['Diproses', 'Selesai']
        : ['Diajukan', 'Ditolak'];

    if ($request->filled('status') && in_array($request->status, $allowedStatus)) {
        $query->where('status', $request->status);
    }

    // Pagination hasil akhir
    $kartukeluargas = $query->orderBy('tanggal', 'desc')->paginate(10);

    return view('admin.kartu_keluarga.index', [
        'kartukeluargas' => $kartukeluargas,
    ]);
}


    public function create()
    {
        return view('/admin.kartu_keluarga.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_kk'             => ['required'],
            'kepala_keluarga'   => ['required'],
            'alamat'            => ['required'],
            'kelurahan_desa'    => ['required'],
            'kecamatan'         => ['required'],
            'kabupaten'         => ['required'],
            'provinsi'          => ['required'],
            'kode_pos'          => ['required'],
            'tanggal_penerbitan'=> ['required', 'date'],
        ]);

        // dd($validatedData);
        Kartukeluarga::create($validatedData);

        return redirect('/admin/kartu-keluarga');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kartukeluarga $kartukeluarga)
    {
        //
    }

    public function edit(Kartukeluarga $kartukeluarga)
    {
        return view('/admin.kartu_keluarga.edit', [
            'kartukeluarga' => $kartukeluarga
        ]);
    }

    public function update(Request $request, Kartukeluarga $kartukeluarga)
    {
        $validatedAttributes = $request->validate([
            'no_kk'             => ['required'],
            'kepala_keluarga'   => ['required'],
            'alamat'            => ['required'],
            'kelurahan_desa'    => ['required'],
            'kecamatan'         => ['required'],
            'kabupaten'         => ['required'],
            'provinsi'          => ['required'],
            'kode_pos'          => ['required'],
            'tanggal_penerbitan'=> ['required', 'date'],
        ]);

        // dd($validatedAttributes);
        $kartukeluarga->update($validatedAttributes);

        return redirect('/admin/kartu-keluarga');
    }

    public function destroy(Kartukeluarga $kartukeluarga)
    {
        $kartukeluarga->delete();

        return redirect('/admin/kartu-keluarga');
    }

    // Search
    public function search(Request $request)
    {
        $search = $request->search;

        $kartukeluargas = Kartukeluarga::search($search)->latest()->paginate(6);

        return view('admin.kartu_keluarga.index', [
            'kartukeluargas' => $kartukeluargas,
        ]);
    }

    // Filter
    public function filter(Request $request)
    {
        $filter = $request->filter;

        if ($filter === 'Terbaru') {
            $kartukeluargas = Kartukeluarga::filterByTanggalPenerbitan('desc')->simplePaginate(6);
        } elseif ($filter === 'Terlama') {
            $kartukeluargas = Kartukeluarga::filterByTanggalPenerbitan('asc')->simplePaginate(6);
        } else {
            $kartukeluargas = Kartukeluarga::with('penduduk')->simplePaginate(6); // default (semua data)
        }

        return view('admin.kartu_keluarga.index', compact('kartukeluargas'));
    }
}
