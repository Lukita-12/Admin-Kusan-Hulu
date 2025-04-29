<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AktaKematian extends Model
{
    use HasFactory;
    protected $table = 'akta_kematian';
    protected $guarded = [];
    protected $casts    = [
        'tanggal' => 'datetime',
    ];

    public function penduduk(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }
}
