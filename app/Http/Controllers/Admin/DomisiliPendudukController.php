<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DomisiliPenduduk;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DomisiliPendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
}
