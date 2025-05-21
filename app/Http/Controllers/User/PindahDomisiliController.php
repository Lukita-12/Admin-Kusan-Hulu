<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kartukeluarga;
use App\Models\Penduduk;
use App\Models\PindahDomisili;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PindahDomisiliController extends Controller
{
    public function index()
    {
        abort(404);
    }

    public function create()
    {
        return view('user.pindah_domisili.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penduduk_id'   => ['required', 'exists:penduduk,id'],
            'alamat_asal'   => ['required'],
            'tujuan'        => ['required'],
            'alasan_pindah' => ['required'],
        ]);

        // Add 'tgl' manually to the validated data
        $validatedData['tanggal'] = now();

        PindahDomisili::create($validatedData);

        return redirect('/beranda');
    }

    public function show(PindahDomisili $pindahDomisili)
    {
        return view('/user.pindah_domisili.show', [
            'pindahDomisili' => $pindahDomisili,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PindahDomisili $pindahDomisili)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PindahDomisili $pindahDomisili)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PindahDomisili $pindahDomisili)
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
            'pekerjaan'             => $penduduk->pekerjaan ?? '',
            'agama'                 => $penduduk->agama ?? '',
            'status_perkawinan'     => $penduduk->status_perkawinan ?? '',
            'warga_negara'          => $penduduk->warga_negara?? '',
            'pendidikan_terakhir'   => $penduduk->pendidikan_terakhir ?? '',
        ]);
    }
}
