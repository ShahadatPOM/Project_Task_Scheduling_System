<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PermissionController extends Controller
{

    public function index()
    {
        $roles = Role::all()->except(1);
        return view('permissions.index',compact('roles'));
    }

    public function create($id)
    {
        $role=Role::find($id);
        $users=Permission::where('name', 'like', '%' . 'user' . '%')->get();
        $roles=Permission::where('name', 'like', '%' . 'role' . '%')->get();
        $departments=Permission::where('name', 'like', '%' . 'department' . '%')->get();
        $teams=Permission::where('name', 'like', '%' . 'team' . '%')->get();
        $leaders=Permission::where('name', 'like', '%' . 'leader' . '%')->get();
        $members=Permission::where('name', 'like', '%' . 'member' . '%')->get();
        $projects=Permission::where('name', 'like', '%' . 'project' . '%')->get();
        $requirements=Permission::where('name', 'like', '%' . 'requirement' . '%')->get();
        $tasks=Permission::where('name', 'like', '%' . 'task' . '%')->get();

        return view('permissions.create',compact('role', 'tasks', 'members', 'users', 'requirements', 'roles', 'departments', 'teams', 'leaders', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
         $role=Role::find($id);
        $role->permissions()->attach($request->id);

        return redirect('permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    public function edit($id)
    {
        $userrole=Role::find($id);
        $users=Permission::where('name', 'like', '%' . 'user' . '%')->get();
        $roles=Permission::where('name', 'like', '%' . 'role' . '%')->get();
        $departments=Permission::where('name', 'like', '%' . 'department' . '%')->get();
        $teams=Permission::where('name', 'like', '%' . 'team' . '%')->get();
        $leaders=Permission::where('name', 'like', '%' . 'leader' . '%')->get();
        $members=Permission::where('name', 'like', '%' . 'member' . '%')->get();
        $projects=Permission::where('name', 'like', '%' . 'project' . '%')->get();
        $requirements=Permission::where('name', 'like', '%' . 'requirement' . '%')->get();
        $tasks=Permission::where('name', 'like', '%' . 'task' . '%')->get();
        foreach($userrole->permissions as $permission)
        {
            $lists[]=$permission->id;
        }

        foreach ($departments as $department){
            $department_ids[]= $department->id;
        }
        foreach ($teams as $team){
            $team_ids[]= $team->id;
        }
        foreach ($leaders as $leader){
            $leader_ids[]= $leader->id;
        }
        foreach ($members as $member){
            $member_ids[]= $member->id;
        }
        foreach ($projects as $project){
            $project_ids[]= $project->id;
        }
        foreach ($requirements as $requirement){
            $requirement_ids[]= $requirement->id;
        }
        foreach ($tasks as $task){
            $task_ids[]=$task->id;
        }
        $ids = array_merge($department_ids, $team_ids, $leader_ids, $member_ids, $project_ids, $requirement_ids, $task_ids);
        return view('permissions.edit',compact('lists','userrole', 'tasks', 'members', 'users', 'requirements', 'roles', 'departments', 'teams', 'leaders', 'projects', 'ids'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $role=Role::find($id);
        $role->permissions()->sync($request->id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
