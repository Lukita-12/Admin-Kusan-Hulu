<?php

use App\Models\AktaKematian;
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
        Schema::create('akta_kematian_penduduk', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AktaKematian::class)->constrained();
            $table->foreignIdFor(Penduduk::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akta_kematian_penduduk');
    }
};
