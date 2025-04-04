<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\PerubahanKartuKeluarga;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PerubahanKartuKeluargaController extends Controller
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
        $penduduks = Penduduk::latest()->get();

        return view('/user.perubahan_kartu_keluarga.create', [
            'penduduks' => $penduduks,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penduduk_name'         => ['required'],
            'deskripsi_perubahan'   => ['required'],
        ]);

        $penduduk = Penduduk::where('nama', $validatedData['penduduk_name'])->first();
        
        if (!$penduduk) {
            return back()->withErrors(['penduduk_nama' => 'Nama penduduk tidak ditemukan'])->withInput();
        }

        $validatedData['penduduk_id'] = $penduduk->id;
        unset($validatedData['penduduk_name']); // Remove desa_name from the array

        $validatedData['tanggal'] = Carbon::now();
        
        PerubahanKartuKeluarga::create($validatedData);

        return redirect('/');
    }

    public function show(PerubahanKartuKeluarga $perubahanKartuKeluarga)
    {
        return view('/user.perubahan-kartu-keluarga.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerubahanKartuKeluarga $perubahanKartuKeluarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerubahanKartuKeluarga $perubahanKartuKeluarga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerubahanKartuKeluarga $perubahanKartuKeluarga)
    {
        //
    }
}
