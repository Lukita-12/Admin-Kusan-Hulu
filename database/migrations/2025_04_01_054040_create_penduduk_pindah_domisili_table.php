<?php

use App\Models\Penduduk;
use App\Models\PindahDomisili;
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
        Schema::create('penduduk_pindah_domisili', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Penduduk::class)->constrained();
            $table->foreignIdFor(PindahDomisili::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk_pindah_domisili');
    }
};
