

<?php

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
        Schema::create('perubahan_kartu_keluarga', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Penduduk::class);
            $table->date('tanggal');
            $table->text('deskripsi_perubahan');
            $table->text('status')->default('Diajukan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perubahan_kartu_keluarga');
    }
};
