<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AktaKematian;
use App\Models\Penduduk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AktaKematianController extends Controller
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
        return view('/user.akta_kematian.create');
    }

    public function store(Request $request)
    {
        {
            $validatedData = $request->validate([
                'nama_pelapor'          => ['required'],
                'nama_dilapor'          => ['required'],
                'tanggal_meninggal'     => ['required'],
                'tempat_meninggal'      => ['required'],
                'penyebab_meninggal'    => ['required'],
            ]);

            // Find residents in the "people" table by full_name
            $pelapor = Penduduk::where('nama', $validatedData['nama_pelapor'])->first();
            $dilapor = Penduduk::where('nama', $validatedData['nama_dilapor'])->first();

            // Add 'tgl' manually to the validated data
            $validatedData['tanggal'] = Carbon::now();
    
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
    
            return redirect('/');
        }
    }

    public function show(AktaKematian $aktaKematian)
    {
        return view('/user.akta_kematian.create', [
            'aktaKematian' => $aktaKematian,
        ]);
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
