<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerubahanKartuKeluarga extends Model
{
    /** @use HasFactory<\Database\Factories\PerubahanKartuKeluargaFactory> */
    use HasFactory;
    protected $table = 'perubahan_kartu_keluarga';
    protected $guarded = [];
    protected $casts = [
        'tanggal' => 'datetime',
    ];

    public function penduduk():BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }

    public function kartukeluarga():BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }
}
