<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kartukeluarga extends Model
{
    /** @use HasFactory<\Database\Factories\KartukeluargaFactory> */
    use HasFactory;
    protected $table = 'kartukeluarga';
    protected $guarded = [];

    public function penduduk(): HasMany
    {
        return $this->hasMany(Penduduk::class);
    }

    // public function perubahan_kartu_keluerga()
    // {
    //     return $this->hasMany(PerubahanKartuKeluarga::class);
    // }

    // Search
    public static function search($keyword): Builder
    {
        return self::with('penduduk')
            ->where('no_kk', 'like', '%' . $keyword . '%')
            ->orWhereHas('penduduk', function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%');
            });
    }

    // Filter
    public static function filterByTanggalPenerbitan($urutan = 'desc')
    {
        return self::with('penduduk')
            ->orderBy('tanggal_penerbitan', $urutan);
    }
}
