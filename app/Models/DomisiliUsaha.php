<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomisiliUsaha extends Model
{
    /** @use HasFactory<\Database\Factories\DomisiliUsahaFactory> */
    use HasFactory;
    protected $table    = 'domisili_usaha';
    protected $guarded  = [];
    protected $casts    = [
        'tanggal' => 'datetime',
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
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

    public function dataPenduduk()
    {
        return $this->belongsTo(DataPenduduk::class);
    }
}
