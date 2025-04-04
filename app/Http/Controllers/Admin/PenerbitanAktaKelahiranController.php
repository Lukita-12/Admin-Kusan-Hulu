<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\PenerbitanAktaKelahiran;
use Illuminate\Http\Request;

class PenerbitanAktaKelahiranController extends Controller
{
    public function index()
    {
        $penerbitanAktaKelahirans = PenerbitanAktaKelahiran::latest()->paginate(6);

        return view('/admin.penerbitan_akta_kelahiran.index', [
            'penerbitanAktaKelahirans' => $penerbitanAktaKelahirans
        ]);
    }

    public function create()
    {
        return view('/admin.penerbitan_akta_kelahiran.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_penduduk'     => ['required'],
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

        $akta = Penduduk::where('nama', $validatedData['nama_penduduk'])->first();
        if (!$akta) {
            return back()->withErrors(['nama_penduduk' => 'Penduduk tidak ditemukan'])->withInput();
        }

        // Handle Image Upload
        foreach (['upload_sp_bidan', 'upload_sp_rt'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $fileName = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('uploads/sp', $fileName, 'public');
    
                $validatedData[$field] = $filePath; // Save file path in DB
            }
        }
        
        $validatedData['penduduk_id'] = $akta->id;
        unset($validatedData['nama_penduduk']); // Remove desa_name from the array

        PenerbitanAktaKelahiran::create($validatedData);

        return redirect('/admin/penerbitan-akta-kelahiran');
    }

    /**
     * Display the specified resource.
     */
    public function show(PenerbitanAktaKelahiran $penerbitanAktaKelahiran)
    {
        dd('You hit it right show!');
    }

    public function edit(PenerbitanAktaKelahiran $penerbitanAktaKelahiran)
    {
        return view('/admin.penerbitan_akta_kelahiran.edit', [
            'penerbitanAktaKelahiran' => $penerbitanAktaKelahiran
        ]);
    }

    public function update(Request $request, PenerbitanAktaKelahiran $penerbitanAktaKelahiran)
    {
        $validatedData = $request->validate([
            'nama_penduduk'     => ['required'],
            'tanggal'           => ['required', 'date'],
            'nomor_akta'        => ['required'],
            'tempat_kelahiran'  => ['required'],
            'nama_anak'         => ['required'],
            'jenis_kelamin'     => ['required', 'in:Laki-laki,Perempuan'],
            'agama'             => ['required'],
            'nama_ayah'         => ['required'],
            'nama_ibu'          => ['required'],
            'upload_sp_bidan'   => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Image validation
            'upload_sp_rt'      => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Image validation
        ]);

        $akta = Penduduk::where('nama', $validatedData['nama_penduduk'])->first();
        if (!$akta) {
            return back()->withErrors(['nama_penduduk' => 'Penduduk tidak ditemukan'])->withInput();
        }
        $validatedData['penduduk_id'] = $akta->id;
        unset($validatedData['nama_penduduk']); // Remove desa_name from the array

        // Handle Image Upload
        foreach (['upload_sp_bidan', 'upload_sp_rt'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $fileName = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('uploads/sp', $fileName, 'public');
    
                $validatedData[$field] = $filePath; // Save file path in DB
            }
        }        

        $penerbitanAktaKelahiran->update($validatedData);

        return redirect('/admin/penerbitan-akta-kelahiran');
    }

    public function destroy(PenerbitanAktaKelahiran $penerbitanAktaKelahiran)
    {
        $penerbitanAktaKelahiran->delete();
        
        return redirect('/admin/penerbitan-akta-kelahiran');
    }
}
