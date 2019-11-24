<?php

namespace App\Http\Controllers;

use App\Department;
use App\ProjectAssign;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use App\Project;
use App\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {

        if (Auth::user()->role->id == 1) {
            $projects = Project::all();
            $teams = Team::all();
            foreach ($teams as $team) {
                $users = User::whereIn('id', $team->members)->get();
            }
            return view('project.index', compact('projects', 'users'));
        }
        elseif (Auth::user()->role->id == 2) {
            $assigns = ProjectAssign::all();
            foreach ($assigns as $assign)
                $assignTime = $assign->created_at;
            $assignProjects = Project::where('id', $assign->project_id)->get();
            $teams = Team::all();
            foreach ($teams as $team) {
                $users = User::whereIn('id', $team->members)->get();
            }
            return view('project.index', compact('assignProjects', 'assignTime', 'users'));
        }
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:projects,title',
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
        $project->status = 0;
        /*if ($request->hasFile('photos')) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx', 'txt', 'html'];
            $files = $request->file('photos');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);

                if ($check) {
                    foreach ($request->photos as $photo) {
                        $filename = $photo->store('photos');

                        File::create([
                            'filename' => $filename
                        ]);
                    }
                }
            }
        }*/
        $project->save();
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
        return view('project.assign', compact('project', 'managers'));
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
