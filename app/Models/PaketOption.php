<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaketOption extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class);
    }
}
