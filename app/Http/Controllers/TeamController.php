<?php

namespace App\Http\Controllers;

use App\Department;
use App\Project;
use App\Team;
use App\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {

    }

    public function create($id)
    {
        $users = User::where('role_id', 4)->get();
        $projects = Project::where('status', 0)->get();
        $department = Department::findOrfail($id);
        return view('team.create', compact('department', 'projects', 'users'));
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
        $team->project_id = $request->project_id;
        $team->members = $request->members;
        $team->status = $request->status;
        $team->save();
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
}
