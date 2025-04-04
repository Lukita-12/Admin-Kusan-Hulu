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
        $pindahDomisilis = PindahDomisili::latest()->paginate(6);

        return view('admin.pindah_domisili.index', [
            'pindahDomisilis' => $pindahDomisilis,
        ]);
    }

    public function create()
    {
        return view('admin.pindah_domisili.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_penduduk' => ['required'],
            'tanggal'       => ['required', 'date'],
            'alamat_asal'   => ['required'],
            'tujuan'        => ['required'],
            'alasan_pindah' => ['required'],
        ]);

        $pendudukdomisili = Penduduk::where('nama', $validatedData['nama_penduduk'])->first();

        $pindahPenduduk = PindahDomisili::create([
            'tanggal'       => $validatedData['tanggal'],
            'alamat_asal'   => $validatedData['alamat_asal'],
            'tujuan'        => $validatedData['tujuan'],
            'alasan_pindah' => $validatedData['alasan_pindah'],
        ]);

        if ($pendudukdomisili) {
            $pindahPenduduk->penduduk()->attach($pendudukdomisili->id);
        }

        return redirect('admin/pindah-domisili');
    }

    /**
     * Display the specified resource.
     */
    public function show(PindahDomisili $pindahDomisili)
    {
        dd('You hit it right Show!');
    }

    public function edit(PindahDomisili $pindahDomisili)
    {
        $namaPenduduk = $pindahDomisili->penduduk->first();

        return view('admin.pindah_domisili.edit', [
            'namaPenduduk'      => $namaPenduduk,
            'pindahDomisili'    => $pindahDomisili,
        ]);
    }

    public function update(Request $request, PindahDomisili $pindahDomisili)
    {
        $validatedData = $request->validate([
            'nama_penduduk' => ['required'],
            'tanggal'       => ['required', 'date'],
            'alamat_asal'   => ['required'],
            'tujuan'        => ['required'],
            'alasan_pindah' => ['required'],
        ]);

        $pendudukdomisili = Penduduk::where('nama', $validatedData['nama_penduduk'])->first();

        $pindahDomisili->update([
            'tanggal'       => $validatedData['tanggal'],
            'alamat_asal'   => $validatedData['alamat_asal'],
            'tujuan'        => $validatedData['tujuan'],
            'alasan_pindah' => $validatedData['alasan_pindah'],
        ]);

        // Attach selected value to pivot table
        if ($pendudukdomisili) {
            $pindahDomisili->penduduk()->sync([$pendudukdomisili->id]);
        }

        return redirect('admin/pindah-domisili');
    }

    public function destroy(PindahDomisili $pindahDomisili)
    {
        $pindahDomisili->penduduk()->detach();
        
        $pindahDomisili->delete();

        return redirect('admin/pindah-domisili');
    }
}
