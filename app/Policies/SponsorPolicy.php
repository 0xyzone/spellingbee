<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Sponsor;
use App\Models\User;

class SponsorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Sponsor');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Sponsor $sponsor): bool
    {
        return $user->checkPermissionTo('view Sponsor');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Sponsor');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Sponsor $sponsor): bool
    {
        return $user->checkPermissionTo('update Sponsor');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Sponsor $sponsor): bool
    {
        return $user->checkPermissionTo('delete Sponsor');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Sponsor $sponsor): bool
    {
        return $user->checkPermissionTo('restore Sponsor');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Sponsor $sponsor): bool
    {
        return $user->checkPermissionTo('force-delete Sponsor');
    }
}
