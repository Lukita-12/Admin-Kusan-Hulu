<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AktaKematian;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class AktaKematianController extends Controller
{
    public function index()
    {
        $aktaKematians = AktaKematian::latest()->paginate(6);

        return view('/admin.akta_kematian.index', [
            'aktaKematians' => $aktaKematians
        ]);
    }

    public function create()
    {
        return view('/admin.akta_kematian.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pelapor'          => ['required'],
            'nama_dilapor'          => ['required'],
            'tanggal'               => ['required', 'date'],
            'tanggal_meninggal'     => ['required'],
            'tempat_meninggal'      => ['required'],
            'penyebab_meninggal'    => ['required'],
        ]);

        // Find residents in the "people" table by full_name
        $pelapor = Penduduk::where('nama', $validatedData['nama_pelapor'])->first();
        $dilapor = Penduduk::where('nama', $validatedData['nama_dilapor'])->first();

        $akta = AktaKematian::create([
            'tanggal'               => $validatedData['tanggal'],
            'tanggal_meninggal'     => $validatedData['tanggal_meninggal'],
            'tempat_meninggal'      => $validatedData['tempat_meninggal'],
            'penyebab_meninggal'    => $validatedData['penyebab_meninggal'],
        ]);

        // Attach residents to pivot table if they exist
        if ($pelapor) {
            $akta->penduduk()->attach($pelapor->id);
        }

        if ($dilapor) {
            $akta->penduduk()->attach($dilapor->id);
        }

        return redirect('/admin/akta-kematian');
    }

    /**
     * Display the specified resource.
     */
    public function show(AktaKematian $aktaKematian)
    {
        //
    }

    public function edit(AktaKematian $aktaKematian)
    {
        // Assuming the first attached penduduk is the pelapor, and the second is dilapor
        $pelapor = $aktaKematian->penduduk->first();
        $dilapor = $aktaKematian->penduduk->count() > 1 ? $aktaKematian->penduduk->last() : null;

        return view('admin.akta_kematian.edit', [
            'aktaKematian' => $aktaKematian,
            'pelapor' => $pelapor,
            'dilapor' => $dilapor,
        ]);
    }

    public function update(Request $request, AktaKematian $aktaKematian)
    {
        $validatedData = $request->validate([
            'nama_pelapor'          => ['required'],
            'nama_dilapor'          => ['required'],
            'tanggal'               => ['required', 'date'],
            'tanggal_meninggal'     => ['required'],
            'tempat_meninggal'      => ['required'],
            'penyebab_meninggal'    => ['required'],
        ]);

        // Find residents in the "people" table by full_name
        $pelapor = Penduduk::where('nama', $validatedData['nama_pelapor'])->first();
        $dilapor = Penduduk::where('nama', $validatedData['nama_dilapor'])->first();

        $aktaKematian->update([
            'tanggal'               => $validatedData['tanggal'],
            'tanggal_meninggal'     => $validatedData['tanggal_meninggal'],
            'tempat_meninggal'      => $validatedData['tempat_meninggal'],
            'penyebab_meninggal'    => $validatedData['penyebab_meninggal'],
        ]);

        // Remove previous relationships
        $aktaKematian->penduduk()->detach();

        // Attach residents to pivot table if they exist
        if ($pelapor) {
            $aktaKematian->penduduk()->attach($pelapor->id);
        }

        if ($dilapor) {
            $aktaKematian->penduduk()->attach($dilapor->id);
        }

        return redirect('/admin/akta-kematian');
    }

    public function destroy(AktaKematian $aktaKematian)
    {
        $aktaKematian->penduduk()->detach();

        $aktaKematian->delete();

        return redirect('/admin/akta-kematian');
    }
}
