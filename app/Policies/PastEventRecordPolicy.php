<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PastEventRecord;
use App\Models\User;

class PastEventRecordPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any PastEventRecord');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PastEventRecord $pasteventrecord): bool
    {
        return $user->checkPermissionTo('view PastEventRecord');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create PastEventRecord');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PastEventRecord $pasteventrecord): bool
    {
        return $user->checkPermissionTo('update PastEventRecord');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PastEventRecord $pasteventrecord): bool
    {
        return $user->checkPermissionTo('delete PastEventRecord');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PastEventRecord $pasteventrecord): bool
    {
        return $user->checkPermissionTo('restore PastEventRecord');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PastEventRecord $pasteventrecord): bool
    {
        return $user->checkPermissionTo('force-delete PastEventRecord');
    }
}
