<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\PerubahanKartuKeluarga;
use Illuminate\Http\Request;

class PerubahanKartuKeluargaController extends Controller
{
    public function index()
    {
        $perubahanKartuKeluargas = PerubahanKartuKeluarga::latest()->paginate(6);
        
        return view('/admin.perubahan_kartu_keluarga.index', [
            'perubahanKartuKeluargas' => $perubahanKartuKeluargas,
        ]);
    }

    public function create()
    {
        return view('/admin.perubahan_kartu_keluarga.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_penduduk'         => ['required'],
            'tanggal'               => ['required', 'date'],
            'deskripsi_perubahan'   => ['required'],
        ]);

        $perubahan = Penduduk::where('nama', $validatedData['nama_penduduk'])->first();
        if (!$perubahan) {
            return back()->withErrors(['nama_penduduk' => 'Penduduk tidak ditemukan'])->withInput();
        }
        $validatedData['penduduk_id'] = $perubahan->id;
        unset($validatedData['nama_penduduk']);

        PerubahanKartuKeluarga::create($validatedData);

        return redirect('/admin/perubahan-kartu-keluarga');
    }

    /**
     * Display the specified resource.
     */
    public function show(PerubahanKartuKeluarga $perubahanKartuKeluarga)
    {
        dd('You hit right Show!');
    }

    public function edit(PerubahanKartuKeluarga $perubahanKartuKeluarga)
    {
        $penduduks = Penduduk::latest()->get();

        return view('/admin.perubahan_kartu_keluarga.edit', [
            'perubahanKartuKeluarga' => $perubahanKartuKeluarga,
            'penduduks' => $penduduks,
        ]);
    }

    public function update(Request $request, PerubahanKartuKeluarga $perubahanKartuKeluarga)
    {
        $validatedData = $request->validate([
            'nama_penduduk'         => ['required'],
            'tanggal'               => ['required', 'date'],
            'deskripsi_perubahan'   => ['required'],
        ]);

        $perubahan = Penduduk::where('nama', $validatedData['nama_penduduk'])->first();
        if (!$perubahan) {
            return back()->withErrors(['nama_penduduk' => 'Penduduk tidak ditemukan'])->withInput();
        }
        $validatedData['penduduk_id'] = $perubahan->id;
        unset($validatedData['nama_penduduk']);

        $perubahanKartuKeluarga->update($validatedData);

        return redirect('/admin/perubahan-kartu-keluarga');
    }

    public function destroy(PerubahanKartuKeluarga $perubahanKartuKeluarga)
    {
        $perubahanKartuKeluarga->delete();

        return redirect('/admin/perubahan-kartu-keluarga');
    }
}
