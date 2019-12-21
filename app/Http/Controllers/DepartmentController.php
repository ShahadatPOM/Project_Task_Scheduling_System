<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function index(){
        $this->authorize('view', Department::class);
        $departments = Department::all();
        return view('department.index', compact('departments'));
    }
    public function create(){
        $this->authorize('create', Department::class);
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
        $notification = array(
            'message' => 'Department created successfully!',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function show(){

    }

    public function edit($id){
        $this->authorize('edit', Department::class);
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
        $notification = array(
            'message' => 'Department updated successfully!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
    public function delete($id){
        $this->authorize('delete', Department::class);
        $department = Department::findOrfail($id);
        $department->delete();
        $notification = array(
            'message' => 'Department deleted successfully!',
            'alert-type' => 'warning'
        );
        return back()->with($notification);
    }
}
