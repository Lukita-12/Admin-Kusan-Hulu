<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AktaKematian extends Model
{
    use HasFactory;
    protected $table = 'akta_kematian';
    protected $guarded = [];

    public function penduduk(): BelongsToMany
    {
        return $this->belongsToMany(Penduduk::class, 'akta_kematian_penduduk');
    }
}
