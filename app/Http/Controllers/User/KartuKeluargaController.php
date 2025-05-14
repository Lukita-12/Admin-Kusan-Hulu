<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kartukeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $kartukeluarga->load('penduduk');

        return view('/user.kartu_keluarga.edit', [
            'kartukeluarga' => $kartukeluarga,
        ]);
    }

    public function update(Request $request, Kartukeluarga $kartukeluarga)
    {
        $validatedAttributes = $request->validate([
            // Validasi untuk data kartu keluarga
            'no_kk'              => ['required'],
            'kepala_keluarga'    => ['required'],
            'alamat'             => ['required'],
            'kelurahan_desa'     => ['required'],
            'kecamatan'          => ['required'],
            'kabupaten'          => ['required'],
            'provinsi'           => ['required'],
            'kode_pos'           => ['required'],
            'tanggal_penerbitan' => ['required', 'date'],

            // Validasi untuk data penduduk
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

        DB::transaction(function () use ($validatedAttributes, $kartukeluarga) {
            // Update data kartu keluarga
            $kartukeluarga->update([
                'no_kk'              => $validatedAttributes['no_kk'],
                'kepala_keluarga'    => $validatedAttributes['kepala_keluarga'],
                'alamat'             => $validatedAttributes['alamat'],
                'kelurahan_desa'     => $validatedAttributes['kelurahan_desa'],
                'kecamatan'          => $validatedAttributes['kecamatan'],
                'kabupaten'          => $validatedAttributes['kabupaten'],
                'provinsi'           => $validatedAttributes['provinsi'],
                'kode_pos'           => $validatedAttributes['kode_pos'],
                'tanggal_penerbitan' => $validatedAttributes['tanggal_penerbitan'],
            ]);

            // Ambil satu penduduk (misalnya yang pertama)
            $penduduk = $kartukeluarga->penduduk()->first();

            if ($penduduk) {
                $penduduk->update([
                    'nama'                      => $validatedAttributes['nama'],
                    'jenis_kelamin'             => $validatedAttributes['jenis_kelamin'],
                    'status_perkawinan'         => $validatedAttributes['status_perkawinan'],
                    'tempat_lahir'              => $validatedAttributes['tempat_lahir'],
                    'tanggal_lahir'             => $validatedAttributes['tanggal_lahir'],
                    'agama'                     => $validatedAttributes['agama'],
                    'pendidikan_terakhir'       => $validatedAttributes['pendidikan_terakhir'],
                    'pekerjaan'                 => $validatedAttributes['pekerjaan'],
                    'alamat_lengkap'            => $validatedAttributes['alamat_lengkap'],
                    'kedudukan_dalam_keluarga'  => $validatedAttributes['kedudukan_dalam_keluarga'],
                    'warga_negara'              => $validatedAttributes['warga_negara'],
                ]);
            }
        });

        return redirect()->route('beranda')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kartukeluarga $kartukeluarga)
    {
        //
    }
}
