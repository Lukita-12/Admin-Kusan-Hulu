<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
        'tanggal' => 'datetime',
    ];

    public function penduduk():BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }
       public function dataPenduduk():BelongsTo
    {
        return $this->belongsTo(dataPenduduk::class);
    }


    // Search
    public static function search($keyword): Builder
    {
        return self::with('penduduk')
            ->whereHas('penduduk', function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%');
            });
    }

    // Filter
    public static function filterByStatus($status)
    {
        return self::with('penduduk.kartukeluarga')
            ->where('status', $status);
    }
}
