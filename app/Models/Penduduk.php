<?php

namespace App\Models;

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

    public function desa(): BelongsTo
    {
        return $this->belongsTo(Desa::class);
    }

    public function kartukeluarga(): BelongsTo
    {
        return $this->belongsTo(Kartukeluarga::class, 'kartukeluarga_id');
    }
    
    
    public function perubahanKartuKeluarga():HasOne
    {
        return $this->hasOne(PerubahanKartuKeluarga::class);
    }

    // Re.

    public function domisiliPenduduk(): HasMany
    {
        return $this->hasMany(DomisiliPenduduk::class);
    }

    public function domisiliUsaha(): HasMany
    {
        return $this->hasMany(DomisiliUsaha::class);
    }

    public function pindahDomisili(): HasOne
    {
        return $this->hasOne(PindahDomisili::class);
    }

    public function penerbitanAktaKelahiran(): HasMany
    {
        return $this->hasMany(PenerbitanAktaKelahiran::class);
    }

    public function aktaKematian(): HasOne
    {
        return $this->hasOne(AktaKematian::class);
    }
}
