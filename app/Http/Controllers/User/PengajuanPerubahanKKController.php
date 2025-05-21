<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kartukeluarga;
use App\Models\PengajuanPerubahanKK;
use Illuminate\Http\Request;

class PengajuanPerubahanKKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Kartukeluarga $kartukeluarga)
    {
        return view('user.kartu_keluarga.create', [
            'kartukeluarga' => $kartukeluarga,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kartukeluarga_id'  => ['required', 'exists:kartukeluarga,id'],

            // Kartu keluarga
            'no_kk'             => ['required'],
            'kepala_keluarga'   => ['required'],
            'alamat'            => ['required'],
            'kelurahan_desa'    => ['required'],
            'kecamatan'         => ['required'],
            'kabupaten'         => ['required'],
            'provinsi'          => ['required'],
            'kode_pos'          => ['required'],
            'tanggal_penerbitan'=> ['required', 'date'],

            // Penduduk
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

        PengajuanPerubahanKK::create($validatedData);

        return redirect('beranda');
    }

    /**
     * Display the specified resource.
     */
    public function show(PengajuanPerubahanKK $pengajuanPerubahanKK)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengajuanPerubahanKK $pengajuanPerubahanKK)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengajuanPerubahanKK $pengajuanPerubahanKK)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengajuanPerubahanKK $pengajuanPerubahanKK)
    {
        //
    }
}
