<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DomisiliPenduduk;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DomisiliPendudukController extends Controller
{
    public function index()
    {
        $domisiliPenduduks = DomisiliPenduduk::with(['penduduk.kartukeluarga'])
            ->latest()->simplePaginate(6);

        return view('admin.domisili_penduduk.index', [
            'domisiliPenduduks' => $domisiliPenduduks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DomisiliPenduduk $domisiliPenduduk)
    {
        //
    }

    public function edit(DomisiliPenduduk $domisiliPenduduk)
    {
        return view('admin.domisili_penduduk.edit', [
            'domisiliPenduduk' => $domisiliPenduduk,
        ]);
    }

    public function update(Request $request, DomisiliPenduduk $domisiliPenduduk)
    {
        $validatedData = $request->validate([
            'nomor_surat'       => ['required', 'string', 'max:255', Rule::unique('domisili_penduduk', 'nomor_surat')->ignore($domisiliPenduduk->id)],
            'tanggal_pengajuan' => ['required', 'date'],
            'status'            => ['required', 'in:Diajukan,Ditolak,Diterima,Selesai'],
        ]);

        $domisiliPenduduk->update($validatedData);

        return('admin/domisili-penduduk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DomisiliPenduduk $domisiliPenduduk)
    {
        //
    }

    // Search
    public function search(Request $request)
    {
        $domisiliPenduduks = DomisiliPenduduk::search($request->search)->latest()->simplePaginate(6);

        return view('admin.domisili_penduduk.index', [
            'domisiliPenduduks' => $domisiliPenduduks,
        ]);
    }

    // Filter
    public function filter(Request $request)
    {   
        $status = $request->status;

        $domisiliPenduduks = $status
            ? DomisiliPenduduk::filterByStatus($status)->latest()->simplePaginate(6)
            : DomisiliPenduduk::with('penduduk.kartukeluarga')->latest()->simplePaginate(6);

        return view('admin.domisili_penduduk.index', [
            'domisiliPenduduks' => $domisiliPenduduks,
        ]);
    }

    // Action
    public function accept(DomisiliPenduduk $domisiliPenduduk)
    {
        $domisiliPenduduk->status = 'Diproses';
        $domisiliPenduduk->save();

        return redirect('/admin/domisili-penduduk');
    }

    public function reject(DomisiliPenduduk $domisiliPenduduk)
    {
        $domisiliPenduduk->status = 'Ditolak';
        $domisiliPenduduk->save();

        return redirect('/admin/domisili-penduduk');
    }

    public function complete(DomisiliPenduduk $domisiliPenduduk)
    {
        $domisiliPenduduk->status = 'Selesai';
        $domisiliPenduduk->save();

        return redirect('/admin/domisili-penduduk');
    }
}
