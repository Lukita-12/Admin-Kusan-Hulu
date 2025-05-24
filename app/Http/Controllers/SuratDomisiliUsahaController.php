<?php

namespace App\Http\Controllers;

use App\Models\DomisiliUsaha;
use Illuminate\Http\Request;

class SuratDomisiliUsahaController extends Controller
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
        $domisiliUsaha = DomisiliUsaha::with('penduduk')->findOrFail($id);
    return view('admin.domisili_usaha.surat', compact('domisiliUsaha'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DomisiliUsaha $domisiliUsaha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DomisiliUsaha $domisiliUsaha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DomisiliUsaha $domisiliUsaha)
    {
        //
    }
}
