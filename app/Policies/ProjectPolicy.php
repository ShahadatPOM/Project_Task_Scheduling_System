<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProjectPolicy
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
     * Determine whether the user can view any projects.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $project
     * @return mixed
     */
    public function view()
    {
        if( in_array('project_view', $this->list)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can create projects.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create()
    {
        if( in_array('project_create', $this->list)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $project
     * @return mixed
     */
    public function update()
    {
        if( in_array('project_update', $this->list)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $project
     * @return mixed
     */
    public function delete()
    {
        if( in_array('project_delete', $this->list)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can restore the project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $project
     * @return mixed
     */
    public function restore(User $user, Project $project)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $project
     * @return mixed
     */
    public function forceDelete(User $user, Project $project)
    {
        //
    }
}
