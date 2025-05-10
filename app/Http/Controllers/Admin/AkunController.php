<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class AkunController extends Controller
{
    public function index()
    {
        $users = User::latest()->simplePaginate(6);

        return view('/admin.akun.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd('You hit it!');
        return view('/admin.akun.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd('You hit it!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        dd('You hit it!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('/admin.akun.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name'          => ['required'],
            'role'          => ['required', 'in:user,admin,super_admin'],
            'email'         => ['required', 'email'],
            'password'      => ['nullable', 'min:8'],
            'profile_pic'   => ['nullable', 'image', 'max:2048'],
        ]);

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

        $user->update($validatedData);

        return redirect('/admin/akun');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        dd('You hit it!');
    }
}
