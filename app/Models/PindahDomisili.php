<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PindahDomisili extends Model
{
    /** @use HasFactory<\Database\Factories\PindahDomisiliFactory> */
    use HasFactory;
    protected $table = 'pindah_domisili';
    protected $guarded = [];

    public function penduduk(): BelongsToMany
    {
        return $this->belongsToMany(Penduduk::class, 'penduduk_pindah_domisili');
    }
}
