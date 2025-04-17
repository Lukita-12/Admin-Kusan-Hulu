<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DomisiliPenduduk extends Model
{
    /** @use HasFactory<\Database\Factories\DomisiliPendudukFactory> */
    use HasFactory;
    protected $table = 'domisili_penduduk';
    protected $guarded = [];
    protected $casts = [
        'tanggal_pengajuan' => 'datetime',
    ];

    public function penduduk():BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }
}
