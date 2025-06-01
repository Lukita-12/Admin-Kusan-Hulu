<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DataPenduduk;
use App\Models\Desa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataPendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Ambil user yang sedang login
    $user = Auth::user();

    // Tampilkan data penduduk hanya milik user yang sedang login
    $dataPenduduk = DataPenduduk::where('user_id', $user->id)->get();

    return view('user.data_penduduk.index', [
        'dataPenduduk' => $dataPenduduk,
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desa = Desa::orderBy('nama_desa')->get(); // Sesuaikan nama kolom 'nama_desa' atau 'nama'

    return view('user.data_penduduk.create', [
        'desa' => $desa
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
           
            'nama'                      => ['required', 'exists:desa,id'],
            'nik'                       => ['required'],
            'no_kk'                     => ['required'],
            'desa_id'                   => ['required'],
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

        $validatedData['user_id'] = $user->id;

        DataPenduduk::create($validatedData);

        return redirect()->route('beranda');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataPenduduk $dataPenduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataPenduduk $dataPenduduk)
    {
        return view ('user.data_penduduk.edit',[
            'dataPenduduk'=>$dataPenduduk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataPenduduk $dataPenduduk)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
           
            'nama'                      => ['required'],
            'nik'                       => ['required'],
            'no_kk'                     => ['required'],
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

        $validatedData['user_id'] = $user->id;

        $dataPenduduk->update($validatedData);

        return redirect()->route('user.data_penduduk.index');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPenduduk $dataPenduduk)
    {
        //
    }
}
