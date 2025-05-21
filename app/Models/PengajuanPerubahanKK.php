<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanPerubahanKK extends Model
{
    /** @use HasFactory<\Database\Factories\PengajuanPerubahanKKFactory> */
    use HasFactory;
    protected $table = 'pengajuan_perubahan_kk';
    protected $guarded = [];

    public function kartukeluarga(): BelongsTo
    {
        return $this->belongsTo(Kartukeluarga::class);
    }
}
