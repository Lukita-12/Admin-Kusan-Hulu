<?php

namespace App\Http\Controllers;

use App\Models\AktaKematian;
use Illuminate\Http\Request;

class SuratAktaKematianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
       $akta = AktaKematian::with('dataPenduduk')->findOrFail($id);
    return view('admin.akta_kematian.surat', compact('akta'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AktaKematian $aktaKematian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AktaKematian $aktaKematian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AktaKematian $aktaKematian)
    {
        //
    }
}
