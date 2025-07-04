<?php

use App\Models\Desa;
use App\Models\Kartukeluarga;
use App\Models\User;
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
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            
            $table->foreignIdFor(Desa::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Kartukeluarga::class)->constrained()->cascadeOnDelete();
            $table->string('nama');
            $table->string('nik');
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
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
