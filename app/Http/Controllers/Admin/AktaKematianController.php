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
        $aktaKematians = AktaKematian::with('penduduk')->latest()->simplePaginate(6);

        return view('/admin.akta_kematian.index', [
            'aktaKematians' => $aktaKematians
        ]);
    }

    public function create()
    {
        $penduduks = Penduduk::with('kartukeluarga')->latest()->get();

        return view('/admin.akta_kematian.create', [
            'penduduks' => $penduduks,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penduduk_id'       => ['required', 'exists:penduduk,id'],
            'tanggal'           => ['required', 'date'],
            'tanggal_meninggal' => ['required'],
            'tempat_meninggal'  => ['required'],
            'penyebab_meninggal'=> ['required'],
        ]);
        
        AktaKematian::create($validatedData);

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
        $penduduks = Penduduk::with('kartukeluarga')->latest()->get();

        return view('admin.akta_kematian.edit', [
            'aktaKematian'  => $aktaKematian,
            'penduduks'      => $penduduks,
        ]);
    }

    public function update(Request $request, AktaKematian $aktaKematian)
    {
        $validatedData = $request->validate([
            'penduduk_id'       => ['required', 'exists:penduduk,id'],
            'tanggal'           => ['required', 'date'],
            'tanggal_meninggal' => ['required'],
            'tempat_meninggal'  => ['required'],
            'penyebab_meninggal'=> ['required'],
        ]);

        $aktaKematian->update($validatedData);

        return redirect('/admin/akta-kematian');
    }

    public function destroy(AktaKematian $aktaKematian)
    {
        $aktaKematian->delete();

        return redirect('/admin/akta-kematian');
    }

    // Search
    public function search(Request $request)
    {
        $aktaKematians = AktaKematian::search($request->search)->latest()->simplePaginate(6);

        return view('admin.akta_kematian.index', [
            'aktaKematians' => $aktaKematians,
        ]);
    }

    // Filter
    public function filter(Request $request)
    {   
        $status = $request->status;

        $aktaKematians = $status
            ? AktaKematian::filterByStatus($status)->latest()->simplePaginate(6)
            : AktaKematian::with('penduduk.kartukeluarga')->latest()->simplePaginate(6);

        return view('admin.akta_kematian.index', [
            'aktaKematians' => $aktaKematians,
        ]);
    }

    // Action
    public function accept(AktaKematian $aktaKematian)
    {
        $aktaKematian->status = 'Diproses';
        $aktaKematian->save();

        return redirect('/admin/akta-kematian');
    }

    public function reject(AktaKematian $aktaKematian)
    {
        $aktaKematian->status = 'Ditolak';
        $aktaKematian->save();

        return redirect('/admin/akta-kematian');
    }

    public function complete(AktaKematian $aktaKematian)
    {
        $aktaKematian->status = 'Selesai';
        $aktaKematian->save();

        return redirect('/admin/akta-kematian');
    }
}
