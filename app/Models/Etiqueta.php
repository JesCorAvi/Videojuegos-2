<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Etiqueta extends Model
{
    use HasFactory;
    public function videojuegos(): MorphToMany
    {
        return $this->morphedByMany(Videojuego::class, 'tageables');
    }

    public function desarrolladoras(): MorphToMany
    {
        return $this->morphedByMany(Desarrolladora::class, 'tageables');
    }
}
