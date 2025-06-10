<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kartukeluarga;
use App\Models\Penduduk;
use App\Models\PenerbitanAktaKelahiran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenerbitanAktaKelahiranController extends Controller
{
    public function index()
    {
        abort(404);
    }

    public function create()
    {
        $user = Auth::user();
        
        return view('/user/penerbitan_akta_kelahiran.create',[
            'user'=>$user,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'data_penduduk_id'       => ['required', 'exists:data_penduduk,id'],
            'nama_anak'         => ['required'],
            'tempat_kelahiran'  => ['required'],
            'nama_ayah'         => ['required'],
            'nama_ibu'          => ['required'],
            'jenis_kelamin'     => ['required', 'in:Laki-laki,Perempuan'],
            'agama'             => ['required'],
            'anak_ke'           => ['required'],
            'upload_sp_bidan'   => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Image validation
            'upload_sp_rt'      => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Image validation
        ]);

        // Handle Image Upload
        foreach (['upload_sp_bidan', 'upload_sp_rt'] as $field) {
            if ($request->hasFile($field)) {
                $file       = $request->file($field);
                $fileName   = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                $filePath   = $file->storeAs('uploads/akta_kelahiran/surat_pengantar', $fileName, 'public');
    
                $validatedData[$field] = $filePath; // Save file path in DB
            }
        }

        // Add 'tgl' manually to the validated data
        $validatedData['tanggal'] = now();
        
        PenerbitanAktaKelahiran::create($validatedData);

         return redirect()->route('beranda')
                     ->with('success', 'Data berhasil dikirim.');
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

    public function cariKK(Request $request)
    {
        $no_kk  = (string) $request->input('no_kk');
        $kk     = Kartukeluarga::where('no_kk', $no_kk)->first();

        if (!$kk) {
            return response()->json(['error' => 'No. Kartu Keluarga tidak ditemukan!', 404]);
        }

        $penduduk = $kk->penduduk()->first();

        return response()->json([
            'penduduk_id'       => $penduduk->id ?? '',
            'nama'              => $penduduk->nama ?? '',
            'ttl'               => $penduduk->tempat_lahir . ', ' . Carbon::parse($penduduk->tanggal_lahir)->translatedFormat('d F Y'),
            'jenis_kelamin'     => $penduduk->jenis_kelamin ?? '',
            'agama'             => $penduduk->agama ?? '',
            'pekerjaan'         => $penduduk->pekerjaan ?? '',
            'alamat_lengkap'    => $penduduk->alamat_lengkap ?? '',
        ]);
    }
}
