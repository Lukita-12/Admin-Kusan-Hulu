<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class AkunController extends Controller
{
    public function index()
    {
        return view('/user.akun.index');
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
    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        return view('user.akun.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'email', 'max:254'],
            'password'    => ['nullable', 'min:8'], // password opsional
            'profile_pic' => ['nullable', 'image', 'max:2048'], // gambar opsional
        ]);

        // Jika password diisi, hash dan simpan
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']); // Jangan update password jika kosong
        }

        // Jika ada file gambar baru
        if ($request->hasFile('profile_pic')) {
            // Hapus gambar lama jika ada
            if ($user->profile_pic && Storage::exists('public/' . $user->profile_pic)) {
                Storage::delete('public/' . $user->profile_pic);
            }

            // Simpan gambar baru
            $path = $request->file('profile_pic')->store('profile_pics', 'public');
            $validatedData['profile_pic'] = $path;
        }

        // Update user dengan data yang telah divalidasi
        $user->update($validatedData);

        return redirect()->route('beranda');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
