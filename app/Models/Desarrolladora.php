<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Desarrolladora extends Model
{
    protected $fillable = [
        'nombre',
        "distribuidora_id"
    ];
    use HasFactory;

    public function distribuidora(): BelongsTo
    {
        return $this->belongsTo(Distribuidora::class);
    }

    public function videojuegos(): HasMany
    {
        return $this->hasMany(Videojuego::class);
    }
    public function etiquetas(): MorphToMany
    {
        return $this->morphToMany(Etiqueta::class, 'tageable');
    }
}
