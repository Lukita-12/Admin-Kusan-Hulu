<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AktaKematian;
use App\Models\Kartukeluarga;
use App\Models\PenerbitanAktaKelahiran;

class DashboardController extends Controller
{
    public function index()
    {
        $kartukeluargas             = Kartukeluarga::latest()->simplepaginate(5);
        $aktaKematians              = AktaKematian::latest()->simplePaginate(5);
        $penerbitanAktaKelahirans   = PenerbitanAktaKelahiran::latest()->simplePaginate(5); 

        return view('dashboard', [
            'kartukeluargas'            => $kartukeluargas,
            'aktaKematians'             => $aktaKematians,
            'penerbitanAktaKelahirans'  => $penerbitanAktaKelahirans,
        ]);
    }
}
