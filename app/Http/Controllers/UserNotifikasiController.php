<?php

namespace App\Http\Controllers;

use App\Models\AktaKematian;
use App\Models\DomisiliPenduduk;
use App\Models\DomisiliUsaha;
use App\Models\PenerbitanAktaKelahiran;
use App\Models\PengajuanPerubahanKK;
use App\Models\PindahDomisili;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserNotifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

    // Domisili Usaha
    $domisiliUsahas = DomisiliUsaha::with('dataPenduduk')
        ->whereHas('dataPenduduk', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

    // Domisili Penduduk
    $domisiliPenduduks = DomisiliPenduduk::with('dataPenduduk')
        ->whereHas('dataPenduduk', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

    // Pindah Domisili
    $pindahDomisilis = PindahDomisili::with('dataPenduduk')
        ->whereHas('dataPenduduk', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

    // Perubahan KK
    $perubahanKks = PengajuanPerubahanKK::with('dataPenduduk')
        ->whereHas('dataPenduduk', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

    // Akta Kelahiran
    $aktaKelahirans = PenerbitanAktaKelahiran::with('dataPenduduk')
        ->whereHas('dataPenduduk', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

    // Akta Kematian
    $aktaKematian = AktaKematian::with('dataPenduduk')
        ->whereHas('dataPenduduk', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

    // Gabungkan semua surat menjadi satu collection
    $surats = collect()
        ->merge($domisiliUsahas)
        ->merge($domisiliPenduduks)
        ->merge($pindahDomisilis)
        ->merge($perubahanKks)
        ->merge($aktaKelahirans)
        ->merge($aktaKematian)
        ->sortByDesc('created_at'); // supaya yang terbaru di atas

    return view('components.user-notifikasi', [
        'surats' => $surats,
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
