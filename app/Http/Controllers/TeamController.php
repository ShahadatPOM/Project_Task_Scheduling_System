<?php

namespace App\Http\Controllers;

use App\Department;
use App\Project;
use App\ProjectAssign;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('team.index', compact('teams'));

    }

    public function create()
    {
        $users = User::where('role_id', 4)->get();
        $departments = Department::all();
        return view('team.create', compact('departments', 'users'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:teams',
            'department_id' => 'required',

        ]);
        $team = new Team();
        $team->name = $request->name;
        $team->department_id = $request->department_id;
        $team->members = $request->members;
        $team->status = $request->status;
        $team->save();

        foreach ($request->members as $member) {
            $user = User::find($member);
            $user->team_id = $team->id;
            $user->save();
            $notification = array(
                'message' => 'User updated successfully!',
                'alert-type' => 'success'
            );
        }

        return back()->with($notification);
    }

    public function memberList($id)
    {
        $team = Team::find($id);

        $mmomberOfTeam = [];
        foreach ($team->members as $member) {
            $memberOfTeam[] = [
                $member
            ];
            $memberNames = User::whereIn('id', $memberOfTeam)->get();
        }

        foreach($memberNames as $leader)
       $leader = User::where('role_id', 3)->first();
        return view('team.memberList', compact('team', 'memberNames', 'leader'));
    }

    public function leader($id)
    {
        $leader = User::find($id);
        $leader->role_id = 3;
        $leader->save();
        return back();
    }
    public function leaderChange($id){
        $changeLeader = User::find($id);
        $changeLeader->role_id = 4;
        $changeLeader->save();
        return back();
    }

    public function show()
    {

    }


    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {

    }

    //Project Manager assign project to team
    public function assignForm($id)
    {
        $members = User::where('role_id', 4)->get();
        $project = Project::findOrfail($id);
        return view('project_manager.assign', compact('project', 'members'));
    }

    public function assign(Request $request, $id)
    {
        $this->validate($request, [

        ]);
        $assign = new ProjectAssign();
        $assign->project_id = $id;
        $assign->manager_id = $request->project_manager;
        $assign->status = 0;
        $assign->save();
        return back();
    }

}
