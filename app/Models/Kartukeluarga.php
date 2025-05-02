<?php

namespace App\Models;

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
}
