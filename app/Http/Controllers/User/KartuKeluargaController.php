<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kartukeluarga;
use Illuminate\Http\Request;

class KartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create()
    {
        return view('/user.kartu_keluarga.create');
    }

    public function store(Request $request)
    {
        $validatedAttributes = $request->validate([
            'no_kk'                 => ['required'],
            'kepala_keluarga'       => ['required'],
            'alamat'                => ['required'],
            'kelurahan_desa'        => ['required'],
            'kecamatan'             => ['required'],
            'kabupaten'             => ['required'],
            'provinsi'              => ['required'],
            'kode_pos'              => ['required'],
            'tanggal_penerbitan'    => ['required', 'date'],
        ]);

        // dd($validatedAttributes);
        Kartukeluarga::create($validatedAttributes);

        return redirect('/user/penduduk/create');
    }

    public function show(Kartukeluarga $kartukeluarga)
    {
        return view('/user.kartu_keluarga', [
            'kartukeluarga' => $kartukeluarga,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kartukeluarga $kartukeluarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kartukeluarga $kartukeluarga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kartukeluarga $kartukeluarga)
    {
        //
    }
}
