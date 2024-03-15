<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PastSchoolRecord;
use App\Models\User;

class PastSchoolRecordPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any PastSchoolRecord');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PastSchoolRecord $pastschoolrecord): bool
    {
        return $user->checkPermissionTo('view PastSchoolRecord');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create PastSchoolRecord');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PastSchoolRecord $pastschoolrecord): bool
    {
        return $user->checkPermissionTo('update PastSchoolRecord');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PastSchoolRecord $pastschoolrecord): bool
    {
        return $user->checkPermissionTo('delete PastSchoolRecord');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PastSchoolRecord $pastschoolrecord): bool
    {
        return $user->checkPermissionTo('restore PastSchoolRecord');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PastSchoolRecord $pastschoolrecord): bool
    {
        return $user->checkPermissionTo('force-delete PastSchoolRecord');
    }
}
