<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\PengajuanPerubahanKK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengajuanPerubahanKKController extends Controller
{
    public function destroy(PengajuanPerubahanKK $pengajuanPerubahanKK)
    {
        $pengajuanPerubahanKK->delete();

        return redirect()->route('admin.kartu_keluarga.index');
    }

    // Action
    public function accept(PengajuanPerubahanKK $pengajuanPerubahanKK)
    {
        $pengajuanPerubahanKK->status = 'Diproses';
        $pengajuanPerubahanKK->save();

        return redirect()->route('admin.kartu_keluarga.index');
    }

    public function reject(PengajuanPerubahanKK $pengajuanPerubahanKK)
    {
        $pengajuanPerubahanKK->status = 'Ditolak';
        $pengajuanPerubahanKK->save();

        return redirect()->route('admin.kartu_keluarga.index');
    }

    public function complete(PengajuanPerubahanKK $pengajuanPerubahanKK)
{
    DB::transaction(function () use ($pengajuanPerubahanKK) {
        // Cari penduduk berdasarkan nik dari pengajuan perubahan KK
        $penduduk = Penduduk::where('nik', $pengajuanPerubahanKK->nik)->first();

        // Validasi jika penduduk tidak ditemukan
        if (!$penduduk) {
            throw new \Exception('Penduduk dengan NIK ' . $pengajuanPerubahanKK->nik . ' tidak ditemukan.');
        }

        // Update data penduduk
        $penduduk->update([
            'nama'                      => $pengajuanPerubahanKK->nama,
            'jenis_kelamin'             => $pengajuanPerubahanKK->jenis_kelamin,
            'status_perkawinan'         => $pengajuanPerubahanKK->status_perkawinan,
            'tempat_lahir'              => $pengajuanPerubahanKK->tempat_lahir,
            'tanggal_lahir'             => $pengajuanPerubahanKK->tanggal_lahir,
            'agama'                     => $pengajuanPerubahanKK->agama,
            'pendidikan_terakhir'       => $pengajuanPerubahanKK->pendidikan_terakhir,
            'pekerjaan'                 => $pengajuanPerubahanKK->pekerjaan,
            'alamat_lengkap'            => $pengajuanPerubahanKK->alamat_lengkap,
            'kedudukan_dalam_keluarga'  => $pengajuanPerubahanKK->kedudukan_dalam_keluarga,
            'warga_negara'              => $pengajuanPerubahanKK->warga_negara,
        ]);

        // Update data kartu keluarga
        $kartukeluarga = $penduduk->kartukeluarga;
        if ($kartukeluarga) {
            $kartukeluarga->update([
                'no_kk'              => $pengajuanPerubahanKK->no_kk,
                'kepala_keluarga'    => $pengajuanPerubahanKK->kepala_keluarga,
                'alamat'             => $pengajuanPerubahanKK->alamat,
                'kelurahan_desa'     => $pengajuanPerubahanKK->kelurahan_desa,
                'kecamatan'          => $pengajuanPerubahanKK->kecamatan,
                'kabupaten'          => $pengajuanPerubahanKK->kabupaten,
                'provinsi'           => $pengajuanPerubahanKK->provinsi,
                'kode_pos'           => $pengajuanPerubahanKK->kode_pos,
                'tanggal_penerbitan' => $pengajuanPerubahanKK->tanggal_penerbitan,
            ]);
        }

        // Update status pengajuan perubahan KK
        $pengajuanPerubahanKK->update([
            'status' => 'Selesai',
        ]);
    });

    return redirect()->route('kartu-keluarga.surat', $pengajuanPerubahanKK->id);
}

}
