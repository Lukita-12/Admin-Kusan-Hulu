<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kartukeluarga;
use Illuminate\Http\Request;

class KartukeluargaController extends Controller
{
    public function index()
    {
        $kartukeluargas = Kartukeluarga::latest()->paginate(6);

        return view('/admin.kartu_keluarga.index', [
            'kartukeluargas' => $kartukeluargas
        ]);
    }

    public function create()
    {
        return view('/admin.kartu_keluarga.create');
    }

    public function store(Request $request)
    {
        $validatedAttributes = $request->validate([
            'no_kk' => ['required'],
            'kepala_keluarga' => ['required'],
            'alamat' => ['required'],
            'kelurahan_desa' => ['required'],
            'kecamatan' => ['required'],
            'kabupaten' => ['required'],
            'provinsi' => ['required'],
            'kode_pos' => ['required'],
            'tanggal_penerbitan' => ['required', 'date'],
        ]);

        // dd($validatedAttributes);
        Kartukeluarga::create($validatedAttributes);

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
            'no_kk' => ['required'],
            'kepala_keluarga' => ['required'],
            'alamat' => ['required'],
            'kelurahan_desa' => ['required'],
            'kecamatan' => ['required'],
            'kabupaten' => ['required'],
            'provinsi' => ['required'],
            'kode_pos' => ['required'],
            'tanggal_penerbitan' => ['required', 'date'],
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
}
