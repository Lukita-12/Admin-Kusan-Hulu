<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomisiliUsaha extends Model
{
    /** @use HasFactory<\Database\Factories\DomisiliUsahaFactory> */
    use HasFactory;
    protected $table = 'domisili_usaha';
    protected $guarded = [];

    public function penduduk()
    {
        return $this->belongsToMany(Penduduk::class, 'penduduk_domisili_usaha');
    }
}
