<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DomisiliPenduduk;
use App\Models\Kartukeluarga;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DomisiliPendudukController extends Controller
{
    public function index()
    {
        abort(404);
    }

    public function create()
    {
        return view('user.domisili_penduduk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'penduduk_id' => 'required|exists:penduduk,id',
        ]);
    
        DomisiliPenduduk::create([
            'penduduk_id'   => $validated['penduduk_id'],
            'tanggal'       => now(), // otomatis tanggal saat ini
            'nomor_surat'   => null,        // biarkan kosong dulu
        ]);

        return redirect()->route('user.domisili_penduduk.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(DomisiliPenduduk $domisiliPenduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DomisiliPenduduk $domisiliPenduduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DomisiliPenduduk $domisiliPenduduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DomisiliPenduduk $domisiliPenduduk)
    {
        //
    }

    public function cariKK(Request $request)
    {
        // dd($request->input('no_kk')); // debug
        $noKK = (string) $request->input('no_kk');

        $kk = Kartukeluarga::where('no_kk', $noKK)->first();

        if (!$kk) {
            return response()->json(['error' => 'KK tidak ditemukan'], 404);
        }

        $penduduk = $kk->penduduk()->first(); // asumsi ambil 1 orang

        return response()->json([
            'penduduk_id'       => $penduduk->id ?? '',
            'nama'              => $penduduk->nama ?? '',
            'ttl'               => $penduduk->tempat_lahir . ', ' . Carbon::parse($penduduk->tanggal_lahir)->translatedFormat('d F Y'),
            'jenis_kelamin'     => $penduduk->jenis_kelamin ?? '',
            'status_perkawinan' => $penduduk->status_perkawinan ?? '',
            'agama'             => $penduduk->agama ?? '',
            'pekerjaan'         => $penduduk->pekerjaan ?? '',
            'warga_negara'      => $penduduk->warga_negara ?? '',
            'alamat'            => $kk->alamat ?? '',
        ]);
    }
}
