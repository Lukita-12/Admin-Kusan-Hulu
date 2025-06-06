<?php

use App\Models\DataPenduduk;
use App\Models\Penduduk;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan_perubahan_kk', function (Blueprint $table) {
            $table->id();
            
            $table->foreignIdFor(DataPenduduk::class)->constrained()->cascadeOnDelete();

            // kartu keluarga
            $table->string('no_kk');
            $table->string('nik');
            $table->string('kepala_keluarga');
            $table->text('alamat');
            $table->string('kelurahan_desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('kode_pos');
            $table->date('tanggal_penerbitan');

            // penduduk
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->default('Laki-laki');
            $table->string('status_perkawinan');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('pendidikan_terakhir');
            $table->string('pekerjaan');
            $table->text('alamat_lengkap');
            $table->string('kedudukan_dalam_keluarga');
            $table->string('warga_negara');
            
            $table->enum('status', ['Diajukan', 'Diproses', 'Ditolak', 'Selesai'])->default('Diajukan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_perubahan_kk');
    }
};
