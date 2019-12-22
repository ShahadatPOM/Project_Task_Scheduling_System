<?php

namespace App\Http\Controllers;

use App\Department;
use App\Requirement;
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
            $projects = Project::all();
            $teams = Team::all();
            $users = [];

           /* $teams = Team::where('leader_id', Auth::id())->get();
            foreach ($teams as $team) {
                $leaderprojects = $team->projects()->get();
            }
            foreach($leaderprojects as $leaderproject){
                if($leaderproject->tasks){
                    $total = 0;
                    foreach($leaderproject->tasks as $task){
                        $total_progress = $total += $task->progress;
                    }
                }
                else{
                    $total_progress= 0;
                }
            }*/
            return view('project.index', compact( 'projects'));

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
        $project->status = 0;
        $project->save();
        $project->departments()->attach($request->departments);
        $requirements = $request->requirements;
        if ($requirements) {
            foreach ($requirements as $requirement) {
                $req = new Requirement();
                $req->name = $requirement;
                $req->percentage = 100/count($requirements);
                $project->requirements()->save($req);
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
        $teams = Team::where('status', 1)->get();
        $project = Project::findOrfail($id);

        return view('project.assign', compact('project', 'teams'));
    }

    public function assign(Request $request, $id)
    {
        $project = Project::find($id);
        $project->status = 1;
        $project->save();
        $project->teams()->sync($request->team);
        return redirect('project.index');
    }

    public function edit($id)
    {
        $ids = [];
        $project = Project::find($id);
        foreach ($project->departments as $department)
        {
            $ids[] = $department->id;
        }
        $departments = Department::all()->except($ids);
        $teams = Team::all();
        return view('project.edit',compact('project','departments','teams'));
    }

    public function update(Request $request, $id)
    {

                $this->validate($request, [
            'title' => 'required|unique:projects,title,'.$id,
            'departments' => 'required',
            'description' => 'required_without:photos',
            'photos' => 'required_without:description|unique:files,filename,'.$id,
            'client' => 'required',
            'estimated_budget' => 'required',
            'estimated_project_duration' => 'required',
        ]);
        $project = Project::find($id);
        $project->title = $request->title;
        $project->description = $request->description;
        $project->client = $request->client;
        $project->estimated_budget = $request->estimated_budget;
        $project->estimated_project_duration = $request->estimated_project_duration;
        $project->status = 0;
        $project->save();
        $project->departments()->sync($request->departments);
        $requirements = $request->requirements;
        if ($requirements) {
            foreach ($requirements as $requirement) {
                $req = new Requirement();
                $req->name = $requirement;
                $req->percentage = 100/count($requirements);
                $project->requirements()->save($req);
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

    public function delete($id)
    {

    }

    public function fileDownload($id)
    {
        $file = File::find($id);
        $path = public_path('files/'.$file->filename);
        return response()->download($path);
    }
}
