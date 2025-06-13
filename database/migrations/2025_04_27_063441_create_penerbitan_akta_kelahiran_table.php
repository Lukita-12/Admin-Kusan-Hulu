<?php

use App\Models\DataPenduduk;
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
        Schema::create('penerbitan_akta_kelahiran', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DataPenduduk::class)->constrained()->cascadeOnDelete();
            $table->date('tanggal');
            $table->string('nomor_akta')->nullable();
            $table->string('nama_anak');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->text('tempat_kelahiran');
            $table->text('tanggal_kelahiran');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->default('Laki-laki');
            $table->string('agama');
            $table->string('anak_ke');
            $table->string('upload_sp_bidan');
            $table->string('upload_sp_rt');
            $table->string('status')->default('Diajukan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerbitan_akta_kelahiran');
    }
};
