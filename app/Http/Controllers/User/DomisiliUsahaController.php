<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DomisiliUsaha;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class DomisiliUsahaController extends Controller
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
        return view('/user/domisili_usaha.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penduduk_name' => ['required'],
            'tanggal'       => ['required', 'date'],
            'nama_usaha'    => ['required'],
            'jenis_usaha'   => ['required'],
            'alamat_usaha'  => ['required'],
        ]);

        // Find residents in the "people" table by full_name
        $namaPenduduk = Penduduk::where('nama', $validatedData['penduduk_name'])->first();

        if (!$namaPenduduk) {
            return back()->withErrors(['penduduk_name' => 'Nama penduduk tidak ditemukan!'])->withInput();
        }
        
        // Create domaint
        $domisiliPenduduk = DomisiliUsaha::create([
            'tanggal'       => $validatedData['tanggal'],
            'nama_usaha'    => $validatedData['nama_usaha'],
            'jenis_usaha'   => $validatedData['jenis_usaha'],
            'alamat_usaha'  => $validatedData['alamat_usaha'],
        ]);

        // Attach to Pivot Table
        $domisiliPenduduk->penduduk()->attach($namaPenduduk->id);

        return redirect('/');
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
}
