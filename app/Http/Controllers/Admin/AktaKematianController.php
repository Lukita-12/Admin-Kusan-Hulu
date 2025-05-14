<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AktaKematian;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AktaKematianController extends Controller
{
   public function index(Request $request)
{
    $role = auth::user()->role;

    // Buat query dasar dengan relasi penduduk
    $query = AktaKematian::with('penduduk');

    // Filter berdasarkan role
    if ($role === 'super_admin') {
        $query->whereIn('status', ['Diproses', 'Selesai']);
    } elseif ($role === 'admin') {
        $query->whereIn('status', ['Diajukan', 'Ditolak','Diproses', 'Selesai']);
    }

    // Tambahkan pencarian jika ada
    if ($request->filled('search')) {
        $query->whereHas('penduduk', function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%');
        });
    }

    // Tambahkan filter status dari dropdown jika valid sesuai role
    $allowedStatus = $role === 'super_admin'
        ? ['Diproses', 'Selesai']
        : ['Diajukan', 'Ditolak'];

    if ($request->filled('status') && in_array($request->status, $allowedStatus)) {
        $query->where('status', $request->status);
    }

    // Ambil hasil query
    $aktaKematians = $query->orderBy('tanggal', 'desc')->paginate(10);

    return view('admin.akta_kematian.index', compact('aktaKematians'));
}



    public function create()
    {
        $penduduks = Penduduk::with('kartukeluarga')->latest()->get();

        return view('/admin.akta_kematian.create', [
            'penduduks' => $penduduks,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penduduk_id'       => ['required', 'exists:penduduk,id'],
            'tanggal'           => ['required', 'date'],
            'tanggal_meninggal' => ['required'],
            'tempat_meninggal'  => ['required'],
            'penyebab_meninggal'=> ['required'],
        ]);
        
        AktaKematian::create($validatedData);

        return redirect('/admin/akta-kematian');
    }

    /**
     * Display the specified resource.
     */
    public function show(AktaKematian $aktaKematian)
    {
        //
    }

    public function edit(AktaKematian $aktaKematian)
    {
        $penduduks = Penduduk::with('kartukeluarga')->latest()->get();

        return view('admin.akta_kematian.edit', [
            'aktaKematian'  => $aktaKematian,
            'penduduks'      => $penduduks,
        ]);
    }

    public function update(Request $request, AktaKematian $aktaKematian)
    {
        $validatedData = $request->validate([
            'penduduk_id'       => ['required', 'exists:penduduk,id'],
            'tanggal'           => ['required', 'date'],
            'tanggal_meninggal' => ['required'],
            'tempat_meninggal'  => ['required'],
            'penyebab_meninggal'=> ['required'],
        ]);

        $aktaKematian->update($validatedData);

        return redirect('/admin/akta-kematian');
    }

    public function destroy(AktaKematian $aktaKematian)
    {
        $aktaKematian->delete();

        return redirect('/admin/akta-kematian');
    }

    // Search
    public function search(Request $request)
    {
        $aktaKematians = AktaKematian::search($request->search)->latest()->simplePaginate(6);

        return view('admin.akta_kematian.index', [
            'aktaKematians' => $aktaKematians,
        ]);
    }

    // Filter
    public function filter(Request $request)
    {   
        $status = $request->status;

        $aktaKematians = $status
            ? AktaKematian::filterByStatus($status)->latest()->simplePaginate(6)
            : AktaKematian::with('penduduk.kartukeluarga')->latest()->simplePaginate(6);

        return view('admin.akta_kematian.index', [
            'aktaKematians' => $aktaKematians,
        ]);
    }

    // Action
    public function accept(AktaKematian $aktaKematian)
    {
        $aktaKematian->status = 'Diproses';
        $aktaKematian->save();

        return redirect('/admin/akta-kematian');
    }

    public function reject(AktaKematian $aktaKematian)
    {
        $aktaKematian->status = 'Ditolak';
        $aktaKematian->save();

        return redirect('/admin/akta-kematian');
    }

    public function complete(AktaKematian $aktaKematian)
    {
        $aktaKematian->status = 'Selesai';
        $aktaKematian->save();

        return redirect()->route('admin.SuratAktaKematian.index');
    }
}
