<?php

use App\Models\DomisiliUsaha;
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
        Schema::create('penduduk_domisili_usaha', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DomisiliUsaha::class)->constrained();
            $table->foreignIdFor(Penduduk::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk_domisili_usaha');
    }
};
