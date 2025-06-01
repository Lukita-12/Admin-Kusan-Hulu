<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DomisiliUsaha;
use App\Models\Kartukeluarga;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DomisiliUsahaController extends Controller
{
    public function index()
    {
        abort(404);
    }

    public function create()
    {
        $user = Auth::user();
        
        return view('/user/domisili_usaha.create',[
            'user'=>$user,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penduduk_id'   => ['required', 'exists:penduduk,id'],
            'nama_usaha'    => ['required'],
            'jenis_usaha'   => ['required'],
            'alamat_usaha'  => ['required'],
        ]);
        // Tambahkan tanggal sekarang ke dalam data yang sudah divalidasi
        $validatedData['tanggal'] = now();
        
        // Create domaint
        DomisiliUsaha::create($validatedData);

        return redirect('/beranda');
         return redirect()->route('user.domisili_usaha.create')
                     ->with('success', 'Data berhasil dikirim.');
    }

    public function show(DomisiliUsaha $domisiliUsaha)
    {
        return view('/user.domisili_usaha.create', [
            'domisiliUsaha' => $domisiliUsaha,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DomisiliUsaha $domisiliUsaha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DomisiliUsaha $domisiliUsaha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DomisiliUsaha $domisiliUsaha)
    {
        //
    }

    public function cariKK(Request $request)
    {
        $noKK   = (string) $request->input('no_kk');
        $kk     = Kartukeluarga::where('no_kk', $noKK)->first();

        if (!$kk) {
            return response()->json(['error' => 'No. Kartu Keluarga tdak ditemukan!', 404]);
        }

        $penduduk = $kk->penduduk()->first();

        return response()->json([
            'penduduk_id'       => $penduduk->id ?? '',
            'nama'              => $penduduk->nama ?? '',
            'ttl'               => $penduduk->tempat_lahir . ', ' . Carbon::parse($penduduk->tanggal_lahir)->translatedFormat('d F Y'),
            'alamat'            => $kk->alamat ?? '',
        ]);
    }
}
