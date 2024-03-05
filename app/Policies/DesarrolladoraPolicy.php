<?php

namespace App\Policies;

use App\Models\Desarrolladora;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DesarrolladoraPolicy
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
    public function view(User $user, Desarrolladora $desarrolladora): void
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
    public function update(User $user, Desarrolladora $desarrolladora): bool
    {
        $user = auth()->user();
        return $user->videojuegos->where("desarrolladora_id", $desarrolladora->id)->first() !== null;

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Desarrolladora $desarrolladora): void
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Desarrolladora $desarrolladora): void
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Desarrolladora $desarrolladora): void
    {
        //
    }
}
