<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\requirement;
use App\User;
use Illuminate\Support\Facades\Auth;

class RequirementPolicy
{
    use HandlesAuthorization;
    public $list = [];
    public function __construct($list = [])
    {
        $user=Auth::user();
        if($user->role->permissions()->exists()) {
            foreach ($user->role->permissions as $key => $permission) {
                $list[] = $permission->name;
            }
            $this->list = $list;
        }
    }
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
    public function view()
    {
        if( in_array('requirement_view', $this->list)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can create requirements.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create()
    {
        if( in_array('requirement_create', $this->list)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the requirement.
     *
     * @param  \App\User  $user
     * @param  \App\requirement  $requirement
     * @return mixed
     */
    public function update()
    {
        if( in_array('requirement_edit', $this->list)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the requirement.
     *
     * @param  \App\User  $user
     * @param  \App\requirement  $requirement
     * @return mixed
     */
    public function delete()
    {
        if( in_array('requirement_delete', $this->list)){
            return true;
        }else{
            return false;
        }
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
