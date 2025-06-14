<?php

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
        Schema::create('kartukeluarga', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk');
            $table->string('nik');
            $table->string('kepala_keluarga');
            $table->text('alamat');
            $table->string('kelurahan_desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('kode_pos');
            $table->string('status_hubungan_dalam_keluarga');
            $table->string('no_paspor');
            $table->string('no_kitas_kitap');
            $table->string('ayah');
            $table->string('ibu');
            $table->date('tanggal_penerbitan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartukeluarga');
    }
};
