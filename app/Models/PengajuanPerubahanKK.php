<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanPerubahanKK extends Model
{
     use HasFactory;

    protected $table = 'pengajuan_perubahan_kk';
    protected $guarded = [];

    public function kartukeluarga(): BelongsTo
    {
        return $this->belongsTo(Kartukeluarga::class);
    }

    public function penduduk(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id'); // pastikan kolom penduduk_id ada di DB
    }

     public function dataPenduduk(): BelongsTo
    {
        return $this->belongsTo(DataPenduduk::class); // pastikan kolom penduduk_id ada di DB
    }
}
