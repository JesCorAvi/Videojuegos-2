<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Distribuidora extends Model
{
    use HasFactory;

    public function desarrolladoras(): HasMany
    {
        return $this->hasMany(Desarrolladora::class);
    }
}
