<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class PaketLayanan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function layanan_options(): HasMany
    {
        return $this->hasMany(PaketOption::class);
    }
}
