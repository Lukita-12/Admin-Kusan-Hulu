<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(6);

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
        dd('You hit it!');
        return view('/admin.akun.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        dd('You hit it!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        dd('You hit it!');
    }
}
