<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Penduduk extends Model
{
    /** @use HasFactory<\Database\Factories\PendudukFactory> */
    use HasFactory;
    protected $table = 'penduduk';
    protected $guarded = [];
    protected $casts = [
        'tanggal_lahir' => 'datetime',
    ];    
    
    public function perubahanKartuKeluarga():HasOne
    {
        return $this->hasOne(PerubahanKartuKeluarga::class);
    }

    // Re.
    public function desa(): BelongsTo
    {
        return $this->belongsTo(Desa::class);
    }

    public function kartukeluarga(): BelongsTo
    {
        return $this->belongsTo(Kartukeluarga::class);
    }

    public function domisiliPenduduk(): HasMany
    {
        return $this->hasMany(DomisiliPenduduk::class);
    }

    public function domisiliUsaha(): HasMany
    {
        return $this->hasMany(DomisiliUsaha::class);
    }

    public function pindahDomisili(): HasMany
    {
        return $this->hasMany(PindahDomisili::class);
    }

    public function penerbitanAktaKelahiran(): HasMany
    {
        return $this->hasMany(PenerbitanAktaKelahiran::class);
    }

    public function aktaKematian(): HasMany
    {
        return $this->hasMany(AktaKematian::class);
    }

    // Search
    public static function search($keyword): Builder
    {
        return self::with('kartuKeluarga')
            ->where('nama', 'like', '%' . $keyword . '%')
            ->orWhereHas('kartuKeluarga', function ($query) use ($keyword) {
                $query->where('no_kk', 'like', '%' . $keyword . '%');
            });
    }

    // Filter
    public static function filterByCreatedAt($urutan = 'desc')
    {
        return self::orderBy('created_at', $urutan);
    }
}
