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
        Schema::create('pindah_domisili', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->text('alamat_asal');
            $table->text('tujuan');
            $table->text('alasan_pindah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pindah_domisili');
    }
};
