<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\PenerbitanAktaKelahiran;
use Illuminate\Http\Request;

class PenerbitanAktaKelahiranController extends Controller
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
        return view('/user.penerbitan_akta_kelahiran.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pendaftar'    => ['required'],
            'tanggal'           => ['required', 'date'],
            'nomor_akta'        => ['required'],
            'tempat_kelahiran'  => ['required'],
            'nama_anak'         => ['required'],
            'jenis_kelamin'     => ['required', 'in:Laki-laki,Perempuan'],
            'agama'             => ['required'],
            'nama_ayah'         => ['required'],
            'nama_ibu'          => ['required'],
            'upload_sp_bidan'   => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Image validation
            'upload_sp_rt'      => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Image validation
        ]);

        // Handle Image Upload
        foreach (['upload_sp_bidan', 'upload_sp_rt'] as $field) {
            if ($request->hasFile($field)) {
                $file       = $request->file($field);
                $fileName   = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                $filePath   = $file->storeAs('uploads/sp', $fileName, 'public');
    
                $validatedData[$field] = $filePath; // Save file path in DB
            }
        }
        
        // Find the corresponding Penduduk by name
        $pendaftar = Penduduk::where('nama', $validatedData['nama_pendaftar'])->first();
        if (!$pendaftar) {
            return back()->withErrors(['nama_pendaftar' => 'Nama tidak ditemukan'])->withInput();
        }
        $validatedData['penduduk_id'] = $pendaftar->id;
        unset($validatedData['nama_pendaftar']); // Remove desa_name from the array
        
        PenerbitanAktaKelahiran::create($validatedData);

        return redirect('/');
    }

    public function show(PenerbitanAktaKelahiran $penerbitanAktaKelahiran)
    {
        return view('/user.penerbitan_akta_kelahiran.create', [
            'penerbitanAktaKelahiran' => $penerbitanAktaKelahiran,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenerbitanAktaKelahiran $penerbitanAktaKelahiran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenerbitanAktaKelahiran $penerbitanAktaKelahiran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenerbitanAktaKelahiran $penerbitanAktaKelahiran)
    {
        //
    }
}
