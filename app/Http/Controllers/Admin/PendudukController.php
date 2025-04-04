<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kartukeluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        $penduduks = Penduduk::latest()->paginate(6);

        return view('/admin.penduduk.index', [
            'penduduks' => $penduduks
        ]);
    }

    public function create()
    {
        return view('/admin.penduduk.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'desa'                      => ['required'],
            'nokartu'         => ['required'],
            'nama'                      => ['required'],
            'jenis_kelamin'             => ['required', 'in:Laki-laki,Perempuan'],
            'status_perkawinan'         => ['required'],
            'tempat_lahir'              => ['required'],
            'tanggal_lahir'             => ['required', 'date'],
            'agama'                     => ['required'],
            'pendidikan_terakhir'       => ['required'],
            'pekerjaan'                 => ['required'],
            'alamat_lengkap'            => ['required'],
            'kedudukan_dalam_keluarga'  => ['required'],
            'warga_negara'              => ['required'],
        ]);

        $desa = Desa::where('nama_desa', $validatedData['desa'])->first();
        $kartuKeluarga = Kartukeluarga::where('no_kk', $validatedData['nokartu'])->first();
        
        if (!$desa) {
            return back()->withErrors(['desa' => 'Desa tidak ditemukan'])->withInput();
        }
        if (!$kartuKeluarga) {
            return back()->withErrors(['nokartu' => 'No. Kartu keluarga tisak ditemukan!'])->withInput();
        }

        // Add desa_id to attributes
        $validatedData['desa_id'] = $desa->id;
        unset($validatedData['desa']); // Remove desa_name from the array
        $validatedData['kartukeluarga_id'] = $kartuKeluarga->id;
        unset($validatedData['nokartu']); // Remove desa_name from the array

        Penduduk::create($validatedData);

        return redirect('/admin/penduduk');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        dd('You hit it right show!');
    }

    public function edit(Penduduk $penduduk)
    {
        return view('/admin.penduduk.edit', [
            'penduduk' => $penduduk,
        ]);
    }

    public function update(Request $request, Penduduk $penduduk)
    {
        $validatedData = $request->validate([
            'desa'                      => ['required'],
            'nokartu'         => ['required'],
            'nama'                      => ['required'],
            'jenis_kelamin'             => ['required', 'in:Laki-laki,Perempuan'],
            'status_perkawinan'         => ['required'],
            'tempat_lahir'              => ['required'],
            'tanggal_lahir'             => ['required', 'date'],
            'agama'                     => ['required'],
            'pendidikan_terakhir'       => ['required'],
            'pekerjaan'                 => ['required'],
            'alamat_lengkap'            => ['required'],
            'kedudukan_dalam_keluarga'  => ['required'],
            'warga_negara'              => ['required'],
        ]);

        $desa = Desa::where('nama_desa', $validatedData['desa'])->first();
        $kartuKeluarga = Kartukeluarga::where('no_kk', $validatedData['nokartu'])->first();
        
        if (!$desa) {
            return back()->withErrors(['desa' => 'Desa tidak ditemukan'])->withInput();
        }
        if (!$kartuKeluarga) {
            return back()->withErrors(['nokartu' => 'No. Kartu keluarga tisak ditemukan!'])->withInput();
        }

        // Add desa_id to attributes
        $validatedData['desa_id'] = $desa->id;
        unset($validatedData['desa']); // Remove desa_name from the array
        $validatedData['kartukeluarga_id'] = $kartuKeluarga->id;
        unset($validatedData['nokartu']); // Remove desa_name from the array

        $penduduk->update($validatedData);

        return redirect('/admin/penduduk');
    }

    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();

        return redirect('/admin/penduduk');
    }
}
