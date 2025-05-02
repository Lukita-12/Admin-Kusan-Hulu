<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomisiliUsaha extends Model
{
    /** @use HasFactory<\Database\Factories\DomisiliUsahaFactory> */
    use HasFactory;
    protected $table    = 'domisili_usaha';
    protected $guarded  = [];
    protected $casts    = [
        'tanggal' => 'datetime',
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}
