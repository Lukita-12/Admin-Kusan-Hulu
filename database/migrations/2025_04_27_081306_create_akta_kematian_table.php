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
        Schema::create('akta_kematian', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DataPenduduk::class)->constrained()->cascadeOnDelete();
            $table->date('tanggal');
            $table->string('nama_alm');
            $table->string('tanggal_meninggal');
            $table->text('tempat_meninggal');
            $table->text('penyebab_meninggal');
            $table->string('status')->default('Diajukan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akta_kematian');
    }
};
