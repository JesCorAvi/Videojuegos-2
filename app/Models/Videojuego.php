<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Videojuego extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'anyo',
        'desarrolladora_id',
        'portada'
    ];

    public function desarrolladora(): BelongsTo
    {
        return $this->belongsTo(Desarrolladora::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'posesiones');
    }
}
