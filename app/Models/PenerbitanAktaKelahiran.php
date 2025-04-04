<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenerbitanAktaKelahiran extends Model
{
    /** @use HasFactory<\Database\Factories\PenerbitanAktaKelahiranFactory> */
    use HasFactory;
    protected $table = 'penerbitan_akta_kelahiran';
    protected $guarded = [];

    public function penduduk(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }
}
