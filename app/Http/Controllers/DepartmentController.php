<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use Toastr;
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
        Toastr::success('Department created successfully');
        return back();
    }

    public function detail($id){
        $department = Department::find($id);
        return view('department.detail', compact('department'));
    }

    public function edit($id){
        $this->authorize('update', Department::class);
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
        Toastr::success('Department updated successfully','Success!');

        return back();
    }
    public function delete($id){
        $this->authorize('delete', Department::class);
        $department = Department::findOrfail($id);
        $department->delete();
        Toastr::success('Department deleted successfully','Success!');

        return back();
    }
}
