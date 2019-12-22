<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Project;
use App\Requirement;
use App\RequirementSubmission;
use App\Task;
use App\Team;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index()
    {
       // $this->authorize('view', Task::class);
        $task = Task::where('member_id', Auth::id())->latest()->first();
        return view('task.index', compact('task'));
    }

    public function edit($id)
    {
        $ids=[];
        $task = Task::find($id);
        foreach ($task->requirements as $requirement)
        {
            $ids[] = $requirement->id;
        }
        $requirements = $task->project->requirements->whereNotIn('id',$ids);
        return view('task.edit', compact('task','requirements'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'description' => 'required_without:files',
            'files' => 'required_without:description'
        ]);
        $task = Task::find($id);
        $task->description = $request->description;
        if ($request->file('files')) {
            foreach ($request->file('files') as $file) {
                $ext = $id . '.' . $file->getClientOriginalExtension();
                $path = public_path('files/tasks');
                $file->move($path, $ext);
                $task->filename = $ext;
            }
        }
        $task->save();
        $task->requirements()->sync($request->tasks);
        return back();

    }


    public function detail($id)
    {
        $task = Task::find($id);
        $difference = count($task->project->requirements) - count($task->requirements);
        return view('task.detail', compact('task', 'difference'));
    }

    public function assignForm($id)
    {
       // $this->authorize('create', Task::class);
        $project ='';
        $user = User::find($id);
        $team = Team::where('leader_id',Auth::id())->first();
        foreach ($team->projects as $project){
            $title[] = $project->title;
        }
        return view('task.assign', compact('user','project'));
    }

    public function assign(Request $request, $id)
    {
        $team = Team::where('leader_id',Auth::id())->first();
        foreach ($team->projects as $project){
            $title = $project->title;
        }
        $date = Carbon::parse($project->created_at)->add($project->estimated_project_duration,'day');

        $this->validate($request, [
            'tasks' => 'required',
            'description' => 'required_without:files',
            'files' => 'required_without:description',
            'submission_date' => "required|date|after:$project->created_at|before:$date"
        ]);
        $task = new Task();

        $task->project_id = $project->id;
        $task->member_id = $id;
        $task->member_id = $id;
        $task->submission_date = $request->submission_date;
        if ($request->file('files')) {
            foreach ($request->file('files') as $file) {
                $ext = $id . '.' . $file->getClientOriginalExtension();
                $path = public_path('files/tasks');
                $file->move($path, $ext);
                $task->filename = $ext;
            }
        }
        $task->save();
        $task->requirements()->attach($request->tasks);
        return back();

    }

    public function taskProgress($id)
    {
        $task = Task::find($id);
        $task->status = 1;
        $task->save();
        return back();

    }

    public function submit($id)
    {
        $requirement = Requirement::find($id);
        return view('task.submit', compact('requirement'));
    }

    public function submitTask(Request $request, $id)
    {
        $requirement = Requirement::find($id);
        $requirement->status = 1;
        $requirement->save();
        $submission = new RequirementSubmission();
        $submission->task_id = $requirement->tasks->first()->id;
        $submission->requirement_id = $id;
        $submission->description = $request->description;
        $submission->link = $request->link;
        if ($request->file) {
            $file = $request->File('file');
            $ext = $requirement->name . '.' . $file->clientExtension();
            $path = public_path('files/requirements/');
            move($path, $ext);
            $submission->file = $ext;
        }
        $submission->save();
        return redirect('task/index');
    }

    public function fileDownload($id)
    {
        $task = Task::find($id);
        $path = public_path() . '/files/tasks/' . $task->filename;
        return response()->download($path);
    }
}
