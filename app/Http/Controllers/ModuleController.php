<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {

    }

    public function create($id)
    {
        $project = Project::findOrfail($id);
        return view('module.create', compact('project'));
    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function show()
    {

    }

    public function delete()
    {

    }


}
