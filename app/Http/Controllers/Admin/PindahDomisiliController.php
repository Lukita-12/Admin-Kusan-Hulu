<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\PindahDomisili;
use Illuminate\Http\Request;

class PindahDomisiliController extends Controller
{
    public function index()
    {
        $pindahDomisilis = PindahDomisili::with('penduduk.kartukeluarga')->latest()->simplePaginate(6);

        return view('admin.pindah_domisili.index', [
            'pindahDomisilis' => $pindahDomisilis,
        ]);
    }

    public function create()
    {
        $penduduks = Penduduk::with('kartukeluarga')->latest()->get();

        return view('admin.pindah_domisili.create', [
            'penduduks' => $penduduks,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penduduk_id'   => ['required', 'exists:penduduk,id'],
            'tanggal'       => ['required', 'date'],
            'alamat_asal'   => ['required'],
            'tujuan'        => ['required'],
            'alasan_pindah' => ['required'],
        ]);

        PindahDomisili::create($validatedData);

        return redirect('admin/pindah-domisili');
    }

    public function show(PindahDomisili $pindahDomisili)
    {
        dd('You hit it right Show!');
    }

    public function edit(PindahDomisili $pindahDomisili)
    {
        $penduduks = Penduduk::with('kartukeluarga')->latest()->get();

        return view('admin.pindah_domisili.edit', [
            'pindahDomisili'=> $pindahDomisili,
            'penduduks'     => $penduduks,
        ]);
    }

    public function update(Request $request, PindahDomisili $pindahDomisili)
    {        
        $validatedData = $request->validate([
            'penduduk_id'   => ['required', 'exists:penduduk,id'],
            'tanggal'       => ['required', 'date'],
            'alamat_asal'   => ['required'],
            'tujuan'        => ['required'],
            'alasan_pindah' => ['required'],
        ]);
        
        $pindahDomisili->update($validatedData);

        return redirect('admin/pindah-domisili');
    }

    public function destroy(PindahDomisili $pindahDomisili)
    {
        $pindahDomisili->delete();

        return redirect('admin/pindah-domisili');
    }

    public function accept(PindahDomisili $pindahDomisili)
    {
        $pindahDomisili->status = 'Diproses';
        $pindahDomisili->save();

        return redirect('/admin/pindah-domisili');
    }

    public function reject(PindahDomisili $pindahDomisili)
    {
        $pindahDomisili->status = 'Ditolak';
        $pindahDomisili->save();

        return redirect('/admin/pindah-domisili');
    }

    public function complete(PindahDomisili $pindahDomisili)
    {
        $pindahDomisili->status = 'Selesai';
        $pindahDomisili->save();

        return redirect('/admin/pindah-domisili');
    }
}
