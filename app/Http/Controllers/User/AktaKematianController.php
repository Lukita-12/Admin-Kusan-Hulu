<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AktaKematian;
use App\Models\Kartukeluarga;
use App\Models\Penduduk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AktaKematianController extends Controller
{
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        
        return view('/user/akta_kematian.create',[
            'user'=>$user,
        ]);
    }

    public function store(Request $request)
    {
        {
            $validatedData = $request->validate([
                'data_penduduk_id'       => ['required', 'exists:data_penduduk,id'],
                'nama_alm'          => ['required'],
                'tanggal_meninggal' => ['required'],
                'tempat_meninggal'  => ['required'],
                'penyebab_meninggal'=> ['required'],
            ]);

            // Add 'tgl' manually to the validated data
            $validatedData['tanggal'] = now();
            
            AktaKematian::create($validatedData);
    
             return redirect()->route('beranda')
                     ->with('success', 'Data berhasil dikirim.');
        }
    }

    public function show(AktaKematian $aktaKematian)
    {
        return view('/user.akta_kematian.create', [
            'aktaKematian' => $aktaKematian,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AktaKematian $aktaKematian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AktaKematian $aktaKematian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AktaKematian $aktaKematian)
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
            'penduduk_id'           => $penduduk->id ?? '',
            'nama'                  => $penduduk->nama ?? '',
            'ttl'                   => $penduduk->tempat_lahir . ', ' . Carbon::parse($penduduk->tanggal_lahir)->translatedFormat('d F Y'),
            'jenis_kelamin'         => $penduduk->jenis_kelamin ?? '',
            'agama'                 => $penduduk->agama ?? '',
            'alamat_lengkap'        => $penduduk->alamat_lengkap ?? '',
        ]);
    }
}
