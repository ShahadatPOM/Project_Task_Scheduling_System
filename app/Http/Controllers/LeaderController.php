<?php

namespace App\Http\Controllers;

use App\Team;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaderController extends Controller
{

    public function index()
    {
        $team = Team::where('leader_id', Auth::id())->first();
        return view('leader.projects',compact('team'));
    }
    public function create()
    {
        $team = Team::where('leader_id', Auth::id())->first();
        return view('leader.ongoing-project',compact('team'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        
    }
    public function edit(cr $cr)
    {
        //
    }
    public function update(Request $request, cr $cr)
    {
        //
    }

    public function destroy(cr $cr)
    {
        //
    }
}
