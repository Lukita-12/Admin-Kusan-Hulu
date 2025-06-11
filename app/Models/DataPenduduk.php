<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenduduk extends Model
{
    /** @use HasFactory<\Database\Factories\DataPendudukFactory> */
    use HasFactory;
    protected $table = 'data_penduduk';
    protected $guarded = [];

  public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}