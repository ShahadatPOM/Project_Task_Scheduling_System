<?php

namespace App\Http\Controllers;

use App\Department;
use App\Task;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use App\Project;
use App\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Collection;

class ProjectController extends Controller
{
    public function index()
    {
        if (Auth::user()->role->id == 1) {
            $projects = Project::all();
            $teams = Team::all();
            $users = collect();
            foreach ($teams as $team) {
                $users = User::whereIn('id', $team->members)->get();
            }
            return view('project.index', compact('projects', 'users'));
        }

    }

    public function create()
    {
        $departments = Department::all();
        $teams = Team::all();
        return view('project.create', compact('departments', 'teams'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:projects,title',
            'departments' => 'required',
            'description' => 'required_without:photos',
            'photos' => 'required_without:description|unique:files,filename',
            'client' => 'required',
            'estimated_budget' => 'required',
            'estimated_project_duration' => 'required',
        ]);
        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->client = $request->client;
        $project->estimated_budget = $request->estimated_budget;
        $project->estimated_project_duration = $request->estimated_project_duration;
        $project->departments = $request->departments;
        $project->status = 0;
        $project->save();
        $requirements = $request->requirements;
        if ($requirements) {
            foreach ($requirements as $requirement) {
                $task = new Task();
                $task->name = $requirement;
                $project->tasks()->save($task);
            }
        }
        $photos = $request->photos;
        if ($photos) {
            foreach ($photos as $u_file) {
                $name = $u_file->getClientOriginalName();
                $u_file->move(public_path() . '/files/', $name);
                $project_file = new File();
                $project_file->filename = $name;

                $project->files()->save($project_file);
            }
        }
        return back();
    }

    public function show($id)
    {
        $project = Project::findOrfail($id);
        return view('project.detail', compact('project'));
    }

    public function assignForm($id)
    {
        $managers = User::where('role_id', 2)->get();
        $project = Project::findOrfail($id);
        $incompleteProjects = ProjectAssign::where('status', 0)->get();

        $teamsHasNoProject = collect();
        if ($incompleteProjects->count() <= 0) {
            $teamsHasNoProject = Team::all();
        } elseif ($incompleteProjects->count() > 0) {
            $aid = [];
            foreach ($incompleteProjects as $incomplete) {
                $aid[] = [
                    $incomplete->team_id
                ];
                $teamsHasNoProject = Team::whereNotIn('id', $aid)->get();
            }
        }
        return view('project.assign', compact('project', 'managers', 'teamsHasNoProject'));
    }

    public function assign(Request $request, $id)
    {

        $this->validate($request, [

        ]);
        $assign = new ProjectAssign();
        $assign->project_id = $id;
        $assign->manager_id = $request->project_manager;
        $assign->team_id = $request->team;
        $assign->status = 0;
        $assign->save();
        return back();
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
