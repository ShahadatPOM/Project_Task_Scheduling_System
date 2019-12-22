<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Department;
use Auth;
class DepartmentPolicy
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
     * Determine whether the user can view any departments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny()
    {
        //
    }

    /**
     * Determine whether the user can view the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function view()
    {
        if( in_array('department_view', $this->list)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can create departments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create()
    {
        if( in_array('department_create', $this->list)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function update()
    {
        if( in_array('department_edit', $this->list)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function delete()
    {
        if( in_array('department_delete', $this->list)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can restore the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function restore()
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function forceDelete()
    {
        //
    }
}
