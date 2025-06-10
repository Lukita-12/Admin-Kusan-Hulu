<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kartukeluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        $penduduks = Penduduk::latest()->simplePaginate(6);

        return view('/admin.penduduk.index', [
            'penduduks' => $penduduks
        ]);
    }

    public function create()
    {
        $desas          = Desa::latest()->get();
        $kartukeluargas = Kartukeluarga::latest()->get();

        return view('/admin.penduduk.create', [
            'desas'         => $desas,
            'kartukeluargas'=> $kartukeluargas,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'desa_id'                   => ['required', 'exists:desa,id'],
            'kartukeluarga_id'          => ['required', 'exists:kartukeluarga,id'],
            'nik'                       => ['required'],
            'nama'                      => ['required'],
            'jenis_kelamin'             => ['required', 'in:Laki-laki,Perempuan'],
            'status_perkawinan'         => ['required'],
            'tempat_lahir'              => ['required'],
            'tanggal_lahir'             => ['required', 'date'],
            'agama'                     => ['required'],
            'pendidikan_terakhir'       => ['required'],
            'pekerjaan'                 => ['required'],
            'alamat_lengkap'            => ['required'],
            'kedudukan_dalam_keluarga'  => ['required'],
            'warga_negara'              => ['required'],
        ]);

        Penduduk::create($validatedData);

        return redirect('/admin/penduduk');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        dd('You hit it right show!');
    }

    public function edit(Penduduk $penduduk)
    {
        $desas          = Desa::latest()->get();
        $kartukeluargas = Kartukeluarga::latest()->get();

        return view('/admin.penduduk.edit', [
            'penduduk'      => $penduduk,
            'desas'         => $desas,
            'kartukeluargas'=> $kartukeluargas,
        ]);
    }

    public function update(Request $request, Penduduk $penduduk)
    {
        $validatedData = $request->validate([
            'desa_id'                   => ['required', 'exists:desa,id'],
            'kartukeluarga_id'          => ['required', 'exists:kartukeluarga,id'],
            'nama'                      => ['required'],
            'jenis_kelamin'             => ['required', 'in:Laki-laki,Perempuan'],
            'status_perkawinan'         => ['required'],
            'tempat_lahir'              => ['required'],
            'tanggal_lahir'             => ['required', 'date'],
            'agama'                     => ['required'],
            'pendidikan_terakhir'       => ['required'],
            'pekerjaan'                 => ['required'],
            'alamat_lengkap'            => ['required'],
            'kedudukan_dalam_keluarga'  => ['required'],
            'warga_negara'              => ['required'],
        ]);

        $penduduk->update($validatedData);

        return redirect('/admin/penduduk');
    }

    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();

        return redirect('/admin/penduduk');
    }

    // Search
    public function search(Request $request)
    {
        $penduduks = Penduduk::search($request->search)->latest()->paginate(10);

        return view('admin.penduduk.index', compact('penduduks'));
    }

    // Filter
    public function filter(Request $request)
    {
        $filter = $request->filter;

        if ($filter === 'Terbaru') {
            $penduduks = Penduduk::filterByCreatedAt('desc')->simplePaginate(6);
        } elseif ($filter === 'Terlama') {
            $penduduks = Penduduk::filterByCreatedAt('asc')->simplePaginate(6);
        } else {
            $penduduks = Penduduk::simplePaginate(6); // default (semua data)
        }

        return view('admin.penduduk.index', compact('penduduks'));
    }
}
