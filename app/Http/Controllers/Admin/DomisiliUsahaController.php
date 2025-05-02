<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DomisiliUsaha;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class DomisiliUsahaController extends Controller
{
    public function index()
    {
        $domisiliUsahas = DomisiliUsaha::with('penduduk')->latest()->simplePaginate(6);

        return view('/admin/domisili_usaha.index', [
            'domisiliUsahas' => $domisiliUsahas,
        ]);
    }

    public function create()
    {
        $penduduks = Penduduk::with('kartukeluarga')->latest()->get();

        return view('/admin/domisili_usaha.create', [
            'penduduks' => $penduduks,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penduduk_id'   => ['required', 'exists:penduduk,id'],
            'tanggal'       => ['required', 'date'],
            'nama_usaha'    => ['required'],
            'jenis_usaha'   => ['required'],
            'alamat_usaha'  => ['required'],
        ]);

        DomisiliUsaha::create($validatedData);

        return redirect('/admin/domisili-usaha');
    }

    /**
     * Display the specified resource.
     */
    public function show(DomisiliUsaha $domisiliUsaha)
    {
        dd('You hit it right Show!');
    }

    public function edit(DomisiliUsaha $domisiliUsaha)
    {
        $penduduks = Penduduk::with('kartukeluarga')->latest()->get();

        return view('/admin/domisili_usaha.edit', [
            'domisiliUsaha' => $domisiliUsaha,
            'penduduks' => $penduduks,
        ]);
    }

    public function update(Request $request, DomisiliUsaha $domisiliUsaha)
    {
        $validatedData = $request->validate([
            'penduduk_id'   => ['required', 'exists:penduduk,id'],
            'tanggal'       => ['required', 'date'],
            'nama_usaha'    => ['required'],
            'jenis_usaha'   => ['required'],
            'alamat_usaha'  => ['required'],
        ]);
        
        $domisiliUsaha->update($validatedData);

        return redirect('/admin/domisili-usaha');
    }

    public function destroy(DomisiliUsaha $domisiliUsaha)
    {
        $domisiliUsaha->delete();

        return redirect('/admin/domisili-usaha');
    }

    public function accept(DomisiliUsaha $domisiliUsaha)
    {
        $domisiliUsaha->status = 'Diproses';
        $domisiliUsaha->save();

        return redirect('/admin/domisili-usaha');
    }

    public function reject(DomisiliUsaha $domisiliUsaha)
    {
        $domisiliUsaha->status = 'Ditolak';
        $domisiliUsaha->save();

        return redirect('/admin/domisili-usaha');
    }

    public function complete(DomisiliUsaha $domisiliUsaha)
    {
        $domisiliUsaha->status = 'Selesai';
        $domisiliUsaha->save();

        return redirect('/admin/domisili-usaha');
    }
}
