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

    public function desa(): BelongsTo
    {
        return $this->belongsTo(Desa::class);
    }

    public function kartukeluarga(): BelongsTo
    {
        return $this->belongsTo(Kartukeluarga::class);
    }
    
    public function penerbitanAktaKelahiran(): HasOne
    {
        return $this->hasOne(PenerbitanAktaKelahiran::class);
    }
    
    public function perubahanKartuKeluarga():HasOne
    {
        return $this->hasOne(PerubahanKartuKeluarga::class);
    }
    
    public function aktaKematian(): BelongsToMany
    {
        return $this->belongsToMany(AktaKematian::class, 'akta_kematian_penduduk');
    }

    public function domisiliUsaha():BelongsToMany
    {
        return $this->belongsToMany(DomisiliUsaha::class, 'penduduk_domisili_usaha');
    }

    public function pindahDomisili(): BelongsToMany
    {
        return $this->belongsToMany(PindahDomisili::class, 'penduduk_pindah_domisili');
    }
}
