<?php

namespace App\Http\Controllers;

use App\Models\DomisiliPenduduk;
use Illuminate\Http\Request;

class SuratDomisiliPendudukController extends Controller
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
    public function show($id)
    {
        $domisiliPenduduk = DomisiliPenduduk::with('dataPenduduk')->findOrFail($id);
    return view('admin.domisili_penduduk.surat', compact('domisiliPenduduk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DomisiliPenduduk $domisiliPenduduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DomisiliPenduduk $domisiliPenduduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DomisiliPenduduk $domisiliPenduduk)
    {
        //
    }
}
