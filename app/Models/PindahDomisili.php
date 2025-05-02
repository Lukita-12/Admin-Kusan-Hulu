<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PindahDomisili extends Model
{
    /** @use HasFactory<\Database\Factories\PindahDomisiliFactory> */
    use HasFactory;
    protected $table = 'pindah_domisili';
    protected $guarded = [];
    protected $casts    = [
        'tanggal' => 'datetime',
    ];

    public function penduduk(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }
}
