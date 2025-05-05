<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kartukeluarga;
use Illuminate\Http\Request;

class KartuKeluargaController extends Controller
{
    public function index()
    {
        $kartukeluargas = Kartukeluarga::with(['penduduk'])->latest()->get();

        return view('/user.kartu_keluarga.index', [
            'kartukeluargas' => $kartukeluargas,
        ]);
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
    public function edit(Kartukeluarga $kartukeluarga)
    {
        return view('/user.kartu_keluarga.edit', [
            'kartukeluarga' => $kartukeluarga,
        ]);
    }

    public function update(Request $request, Kartukeluarga $kartukeluarga)
    {
        $validatedAttributes = $request->validate([
            'no_kk'              => ['required'],
            'kepala_keluarga'    => ['required'],
            'alamat'             => ['required'],
            'kelurahan_desa'     => ['required'],
            'kecamatan'          => ['required'],
            'kabupaten'          => ['required'],
            'provinsi'           => ['required'],
            'kode_pos'           => ['required'],
            'tanggal_penerbitan' => ['required', 'date'],
        ]);
        $kartukeluarga->update($validatedAttributes);
        
        $penduduk = $kartukeluarga->penduduk()->first();

        dd($penduduk);

        // Redirect ke halaman edit penduduk jika ada
        if ($penduduk) {
            return redirect()->route('user.penduduk.edit', $penduduk->id)->with('success', 'Data kartu keluarga berhasil diperbarui.');
        }

        // Jika tidak ada penduduk, kembali ke halaman sebelumnya dengan pesan error
        return redirect()->back()->with('error', 'Data diperbarui, tetapi tidak ditemukan penduduk terkait.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kartukeluarga $kartukeluarga)
    {
        //
    }
}
