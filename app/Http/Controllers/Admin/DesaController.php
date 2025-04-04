<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function index()
    {
        $desas = Desa::latest()->paginate(6);

        return view('/admin.desa.index', [
            'desas' => $desas
        ]);
    }

    public function create()
    {
        return view('/admin.desa.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_desa' => ['required'],
        ]);

        Desa::create($validatedData);

        return redirect('/admin/desa');
    }

    /**
     * Display the specified resource.
     */
    public function show(Desa $desa)
    {
        //
    }

    public function edit(Desa $desa)
    {
        return view('/admin.desa.edit', [
            'desa' => $desa
        ]);
    }

    public function update(Request $request, Desa $desa)
    {
        $validatedData = $request->validate([
            'nama_desa' => ['required'],
        ]);

        $desa->update($validatedData);

        return redirect('/admin/desa');
    }

    public function destroy(Desa $desa)
    {
        $desa->delete();

        return redirect('/admin/desa');
    }
}
