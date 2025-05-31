<?php

namespace App\Http\Controllers;

use App\Models\PenerbitanAktaKelahiran;
use Illuminate\Http\Request;

class SuratAktaKelahiranController extends Controller
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
        $penerbitanAktaKelahiran = PenerbitanAktaKelahiran::with('penduduk')->findOrFail($id);
    return view('admin.penerbitan_akta_kelahiran.surat', compact('penerbitanAktaKelahiran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenerbitanAktaKelahiran $penerbitanAktaKelahiran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenerbitanAktaKelahiran $penerbitanAktaKelahiran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenerbitanAktaKelahiran $penerbitanAktaKelahiran)
    {
        //
    }
}
