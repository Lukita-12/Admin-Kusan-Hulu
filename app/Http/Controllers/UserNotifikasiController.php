<?php

namespace App\Http\Controllers;

use App\Models\DomisiliUsaha;
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

        // Ambil data domisili usaha milik user yang sedang login
        $domisiliUsahas = DomisiliUsaha::with('penduduk')
            ->whereHas('penduduk', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->latest()->get();

        return view('components.user-notifikasi', [
            'domisiliUsahas' => $domisiliUsahas,
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
