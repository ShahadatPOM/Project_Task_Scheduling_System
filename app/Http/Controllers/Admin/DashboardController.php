<?php

namespace App\Http\Controllers\admin;

use App\Activity;
use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $projects = Project::all();
        $activities = Activity::where('user_id', Auth::id())->get();
        return view('admin.dashboard', compact('projects', 'activities'));

    }
}
