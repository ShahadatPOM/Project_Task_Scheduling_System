<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Project;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function assignForm($id){
        $project = Project::find($id);
        return view('task.assign', compact('project'));
    }

    public function assign(Request $request, $id){
       $tasks = Task::whereIn('id', $request->tasks)
                        ->where('project_id', $id)
                        ->get();
       foreach($tasks as $task){
           $task->user_id  = $request->member;
           $task->status = 1;
           $task->save();
       }
            return back();

    }
}
