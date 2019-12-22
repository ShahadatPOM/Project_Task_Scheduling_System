<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Team;
use App\User;
use Illuminate\Support\Facades\Auth;

class TeamPolicy
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
     * Determine whether the user can view any teams.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the team.
     *
     * @param  \App\User  $user
     * @param  \App\Team  $team
     * @return mixed
     */
    public function view()
    {
        if( in_array('team_view', $this->list)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can create teams.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create()
    {
        if( in_array('team_create', $this->list)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the team.
     *
     * @param  \App\User  $user
     * @param  \App\Team  $team
     * @return mixed
     */
    public function update()
    {
        if( in_array('team_edit', $this->list)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the team.
     *
     * @param  \App\User  $user
     * @param  \App\Team  $team
     * @return mixed
     */
    public function delete()
    {
        if( in_array('team_delete', $this->list)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can restore the team.
     *
     * @param  \App\User  $user
     * @param  \App\Team  $team
     * @return mixed
     */
    public function restore(User $user, Team $team)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the team.
     *
     * @param  \App\User  $user
     * @param  \App\Team  $team
     * @return mixed
     */
    public function forceDelete(User $user, Team $team)
    {
        //
    }
}
