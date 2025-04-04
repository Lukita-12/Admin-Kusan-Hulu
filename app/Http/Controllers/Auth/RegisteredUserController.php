<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
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
        return view('/auth.register');
    }

    public function store(Request $request)
    {
        // Validate
        $validatedDate = $request->validate([
            'name'              => ['required'],
            'email'             => ['required', 'email', 'max:254'],
            'password'          => ['required', Password::min(8), 'confirmed'], // password_confirmation
            'remember_token'    => ['nullable'],
        ]);
        // Create
        $user = User::create($validatedDate);

        // Log In
        Auth::login($user);

        // Redirect
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
