<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Videojuego;
use Illuminate\Auth\Access\Response;

class VideojuegoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): void
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Videojuego $videojuego): void
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): void
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Videojuego $videojuego): bool
    {
        return auth()->user()->videojuegos->contains($videojuego);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Videojuego $videojuego): bool
    {
        return auth()->user()->videojuegos->contains($videojuego);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Videojuego $videojuego): void
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Videojuego $videojuego): void
    {
        //
    }
}
