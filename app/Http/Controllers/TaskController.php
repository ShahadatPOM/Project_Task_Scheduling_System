<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Project;
use App\Requirement;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index()
    {
        /*if (Auth::user()->role_id == 4) {*/
            $task= Task::where('member_id', Auth::id())->first();
            return view('task.index', compact('task'));
      /*  }*/
    }

    public function detail($id){
        $task = Task::find($id);
        $difference = count($task->project->requirements) - count($task->requirements);
        return view('task.detail', compact('task', 'difference'));
    }

    public function assignForm($id)
    {
        $project = Project::find($id);
        return view('task.assign', compact('project'));
    }

    public function assign(Request $request, $id)
    {
        $this->validate($request, [
            'member_id' => 'required',
            'tasks' => 'required',
            'description' => 'required_without:files',
            'files' => 'required_without:description'
        ]);
        $task = new Task();
        $task->project_id = $id;
        $task->member_id = $request->member_id;
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
        $task->requirements()->attach($request->tasks);
        return back();

    }

    public function taskProgress($id)
    {
        $requirement = Requirement::find($id);
        if ($requirement->status = 0)
            $requirement->status = 1;

        elseif ($requirement->status = 1)
            $requirement->status = 2;

        $requirement->save();
        return back();

    }

    public function submit($id){
        $requirement = Requirement::find($id);
        return view('task.submit',compact('requirement'));
        /*$requirement->status = 3;
        $requirement->save();
        return back();*/
    }

    public function submitTask(Request $request, $id){
        dd($request->all());
        $requirement = Requirement::find($id);
        $requirement->description = $request->description;
        $requirement->link = $request->link;
        if ($request->file) {
            $file = $request->File('file');
            $ext = $requirement->name.'.'.$file->clientExtension();
            $path = public_path('files/requirements/');
            move($path,$ext);
            $requirement->file = $ext;
        }
        $requirement->save();
        Toastr::success('File Has Been Submitted Succesfully, wait for the confirmation','Success!');
        return back();
    }

    public function fileDownload($id)
    {
        $task = Task::find($id);
        $path = public_path() . '/files/tasks/'.$task->filename;
        return response()->download($path);
    }
}
