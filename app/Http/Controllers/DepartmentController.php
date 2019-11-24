<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::all();
        return view('department.index', compact('departments'));

    }
    public function create(){
        return view('department.create');
    }
    public function store(Request $request){
        $this->validate($request, [
           'name' => 'required|unique:departments',
        ]);
        $department= new Department();
        $department->name = $request->name;
        $department->status = $request->status;
        $department->save();
        return back();
    }

    public function show(){

    }

    public function edit($id){
        $department = Department::findOrfail($id);
        return view('department.edit', compact('department'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
           'name' => 'required|unique:departments,name,'.$request->id,
        ]);
        $department = Department::findOrfail($id);
        $department->name = $request->name;
        $department->status = $request->status;
        $department->save();
        return back();
    }
    public function delete($id){
        $department = Department::findOrfail($id);
        $department->delete();
        return back();
    }
}
