<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\PindahDomisili;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PindahDomisiliController extends Controller
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
        return view('user.pindah_domisili.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penduduk_name' => ['required'],
            'alamat_asal'   => ['required'],
            'tujuan'        => ['required'],
            'alasan_pindah' => ['required'],
        ]);

        $namaPenduduk = Penduduk::where('nama', $validatedData['penduduk_name'])->first();

        if (!$namaPenduduk) {
            return back()->withErrors(['penduduk_name' => 'Nama penduduk tidak ditemukan!'])->withInput();
        }

        // Add 'tgl' manually to the validated data
        $validatedData['tanggal'] = Carbon::now();

        $pindahPenduduk = PindahDomisili::create([
            'tanggal'       => $validatedData['tanggal'],
            'alamat_asal'   => $validatedData['alamat_asal'],
            'tujuan'        => $validatedData['tujuan'],
            'alasan_pindah' => $validatedData['alasan_pindah'],
        ]);

        $pindahPenduduk->penduduk()->attach($namaPenduduk->id);

        return redirect('/');
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
}
