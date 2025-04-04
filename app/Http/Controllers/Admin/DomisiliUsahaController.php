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
        $domisiliUsahas = DomisiliUsaha::latest()->paginate();

        return view('/admin/domisili_usaha.index', [
            'domisiliUsahas' => $domisiliUsahas,
        ]);
    }

    public function create()
    {
        return view('/admin/domisili_usaha.create');
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
        $pemilik = $domisiliUsaha->penduduk->first();

        return view('/admin/domisili_usaha.edit', [
            'domisiliUsaha' => $domisiliUsaha,
            'pemilik' => $pemilik,
        ]);
    }

    public function update(Request $request, DomisiliUsaha $domisiliUsaha)
    {
        $validatedData = $request->validate([
            'penduduk_name' => ['required'],
            'tanggal'       => ['required', 'date'],
            'nama_usaha'    => ['required'],
            'jenis_usaha'   => ['required'],
            'alamat_usaha'  => ['required'],
        ]);

        $pemilik = Penduduk::where('nama', $validatedData['penduduk_name'])->first();

        // Create domaint
        $domisiliUsaha->update([
            'tanggal'       => $request->input('tanggal'),
            'nama_usaha'    => $request->input('nama_usaha'),
            'jenis_usaha'   => $request->input('jenis_usaha'),
            'alamat_usaha'  => $request->input('alamat_usaha'),
        ]);

        // Attach selected value to pivot table
        if ($pemilik) {
            $domisiliUsaha->penduduk()->sync([$pemilik->id]);
        }

        return redirect('/admin/domisili-usaha');
    }

    public function destroy(DomisiliUsaha $domisiliUsaha)
    {
        // Detach all related people before deleting (to avoid orphaned records)
        $domisiliUsaha->penduduk()->detach();

        $domisiliUsaha->delete();

        return redirect('/admin/domisili-usaha');
    }
}
