<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kartukeluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
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
        {
            $desas = Desa::latest()->get();
            $kartukeluargas = Kartukeluarga::latest()->get();
    
            return view('/user.penduduk.create', [
                'desas' => $desas,
                'kartukeluargas' => $kartukeluargas,
            ]);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'desa_name'                 => ['required'],
            'no_kartu_keluarga'         => ['required'],
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

        // Find Desa by name
        $desa = Desa::where('nama_desa', $validatedData['desa_name'])->first();
        $kartuKeluarga = Kartukeluarga::where('no_kk', $validatedData['no_kartu_keluarga'])->first();

        if (!$desa) {
            return back()->withErrors(['desa_name' => 'Desa tidak ditemukan'])->withInput();
        }
        if (!$kartuKeluarga) {
            return back()->withErrors(['no_kartu_keluarga' => 'No. Kartu keluarga tisak ditemukan!'])->withInput();
        }

        // Add desa_id to attributes
        $validatedData['desa_id'] = $desa->id;
        unset($validatedData['desa_name']); // Remove desa_name from the array
        $validatedData['kartukeluarga_id'] = $kartuKeluarga->id;
        unset($validatedData['no_kartu_keluarga']); // Remove desa_name from the array

        Penduduk::create($validatedData);

        return redirect('/');
    }

    public function show(Penduduk $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penduduk $penduduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        //
    }
}
