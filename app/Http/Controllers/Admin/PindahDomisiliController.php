<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\PindahDomisili;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PindahDomisiliController extends Controller
{
    public function index(Request $request)
{
    $role = Auth::user()->role;

    // Query dasar dengan eager loading relasi
    $query = PindahDomisili::with('penduduk.kartukeluarga');

    // Filter berdasarkan role
    if ($role === 'super_admin') {
        $query->whereIn('status', ['Diproses', 'Selesai']);
    } elseif ($role === 'admin') {
        $query->whereIn('status', ['Diajukan', 'Ditolak','Diproses', 'Selesai']);
    }

    // Pencarian berdasarkan nama penduduk
    if ($request->filled('search')) {
        $query->whereHas('penduduk', function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%');
        });
    }

    // Validasi filter status sesuai role
    $allowedStatus = $role === 'super_admin'
        ? ['Diproses', 'Selesai']
        : ['Diajukan', 'Ditolak'];

    if ($request->filled('status') && in_array($request->status, $allowedStatus)) {
        $query->where('status', $request->status);
    }

    // Eksekusi query dengan paginate
    $pindahDomisilis = $query->orderBy('tanggal', 'desc')->paginate(10);

    return view('admin.pindah_domisili.index', [
        'pindahDomisilis' => $pindahDomisilis,
    ]);
}


    public function create()
    {
        $penduduks = Penduduk::with('kartukeluarga')->latest()->get();

        return view('admin.pindah_domisili.create', [
            'penduduks' => $penduduks,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penduduk_id'   => ['required', 'exists:penduduk,id'],
            'tanggal'       => ['required', 'date'],
            'alamat_asal'   => ['required'],
            'tujuan'        => ['required'],
            'alasan_pindah' => ['required'],
        ]);

        PindahDomisili::create($validatedData);

        return redirect('admin/pindah-domisili');
    }

    public function show(PindahDomisili $pindahDomisili)
    {
        dd('You hit it right Show!');
    }

    public function edit(PindahDomisili $pindahDomisili)
    {
        $penduduks = Penduduk::with('kartukeluarga')->latest()->get();

        return view('admin.pindah_domisili.edit', [
            'pindahDomisili'=> $pindahDomisili,
            'penduduks'     => $penduduks,
        ]);
    }

    public function update(Request $request, PindahDomisili $pindahDomisili)
    {        
        $validatedData = $request->validate([
            'penduduk_id'   => ['required', 'exists:penduduk,id'],
            'tanggal'       => ['required', 'date'],
            'alamat_asal'   => ['required'],
            'tujuan'        => ['required'],
            'alasan_pindah' => ['required'],
        ]);
        
        $pindahDomisili->update($validatedData);

        return redirect('admin/pindah-domisili');
    }

    public function destroy(PindahDomisili $pindahDomisili)
    {
        $pindahDomisili->delete();

        return redirect('admin/pindah-domisili');
    }

    // Search
    public function search(Request $request)
    {
        $pindahDomisilis = PindahDomisili::search($request->search)->latest()->simplePaginate(6);

        return view('admin.pindah_domisili.index', compact('pindahDomisilis'));
    }

    // Filter
    public function filter(Request $request)
    {
        $status = $request->status;

        $pindahDomisilis = $status
            ? PindahDomisili::filterByStatus($status)->latest()->simplePaginate(6)
            : PindahDomisili::with('penduduk.kartukeluarga')->latest()->simplePaginate(6);

        return view('admin.pindah_domisili.index', compact('pindahDomisilis'));
    }

    // Action
    public function accept(PindahDomisili $pindahDomisili)
    {
        $pindahDomisili->status = 'Diproses';
        $pindahDomisili->save();

        return redirect('/admin/pindah-domisili');
    }

    public function reject(PindahDomisili $pindahDomisili)
    {
        $pindahDomisili->status = 'Ditolak';
        $pindahDomisili->save();

        return redirect('/admin/pindah-domisili');
    }

    public function complete(PindahDomisili $pindahDomisili)
    {
        $pindahDomisili->status = 'Selesai';
        $pindahDomisili->save();

        return redirect('/admin/pindah-domisili');
    }
}
