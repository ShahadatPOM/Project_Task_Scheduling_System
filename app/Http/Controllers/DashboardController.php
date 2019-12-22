<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Department;
use App\Http\Controllers\Controller;
use App\Project;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $projects = Project::all();
        $teams = Team::all();
        $departments = Department::all();
        $pendingProjects = Project::where('status', 0)->get();
        $completedProjects = Project::where('status', 2)->get();
        $activities = Activity::where('user_id', Auth::id())->get();
        return view('admin.dashboard', compact('projects', 'activities', 'teams', 'departments', 'pendingProjects', 'completedProjects'));

    }
}
