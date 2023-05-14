<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->hasAnyRole('super-admin', 'admin', 'moderator');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->hasAnyRole('super-admin', 'admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model)
    {
        return $user->hasAnyRole('super-admin', 'admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model)
    {
        return $user->hasAnyRole('super-admin', 'admin');
    }

    public function restore(User $user, User $model)
    {
        return $user->hasAnyRole(['super-admin', 'admin']);
    }
}
