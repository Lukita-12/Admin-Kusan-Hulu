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
        Schema::create('domisili_usaha', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DataPenduduk::class)->constrained()->cascadeOnDelete();
            $table->date('tanggal');
            $table->string('nama_usaha');
            $table->string('jenis_usaha');
            $table->text('alamat_usaha');
            $table->string('status')->default('Diajukan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domisili_usaha');
    }
};
