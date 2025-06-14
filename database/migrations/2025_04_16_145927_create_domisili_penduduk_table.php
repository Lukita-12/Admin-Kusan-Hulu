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
        Schema::create('domisili_penduduk', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DataPenduduk::class)->constrained()->cascadeOnDelete();
            $table->date('tanggal');
            $table->string('nomor_surat')->nullable();
            $table->string('status')->default('Diajukan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domisili_penduduk');
    }
};
