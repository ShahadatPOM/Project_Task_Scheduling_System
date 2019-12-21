<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\requirement;
use App\User;

class RequirementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any requirements.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the requirement.
     *
     * @param  \App\User  $user
     * @param  \App\requirement  $requirement
     * @return mixed
     */
    public function view(User $user, requirement $requirement)
    {
        //
    }

    /**
     * Determine whether the user can create requirements.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the requirement.
     *
     * @param  \App\User  $user
     * @param  \App\requirement  $requirement
     * @return mixed
     */
    public function update(User $user, requirement $requirement)
    {
        //
    }

    /**
     * Determine whether the user can delete the requirement.
     *
     * @param  \App\User  $user
     * @param  \App\requirement  $requirement
     * @return mixed
     */
    public function delete(User $user, requirement $requirement)
    {
        //
    }

    /**
     * Determine whether the user can restore the requirement.
     *
     * @param  \App\User  $user
     * @param  \App\requirement  $requirement
     * @return mixed
     */
    public function restore(User $user, requirement $requirement)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the requirement.
     *
     * @param  \App\User  $user
     * @param  \App\requirement  $requirement
     * @return mixed
     */
    public function forceDelete(User $user, requirement $requirement)
    {
        //
    }
}
