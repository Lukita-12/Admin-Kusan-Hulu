<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PindahDomisili extends Model
{
    /** @use HasFactory<\Database\Factories\PindahDomisiliFactory> */
    use HasFactory;
    protected $table = 'pindah_domisili';
    protected $guarded = [];

    public function penduduk(): HasMany
    {
        return $this->hasMany(Penduduk::class);
    }
}
