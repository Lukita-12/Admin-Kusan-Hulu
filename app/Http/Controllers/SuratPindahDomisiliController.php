<?php

namespace App\Http\Controllers;

use App\Models\PindahDomisili;
use Illuminate\Http\Request;

class SuratPindahDomisiliController extends Controller
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
         $pindahDomisili = PindahDomisili::with('dataPenduduk')->findOrFail($id);

    return view('admin.pindah_domisili.surat', compact('pindahDomisili'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PindahDomisili $pindahDomisili)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PindahDomisili $pindahDomisili)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PindahDomisili $pindahDomisili)
    {
        //
    }
}
