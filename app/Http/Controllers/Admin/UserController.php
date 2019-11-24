<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $users = User::all()->except(Auth::id());
        return view('user.index', compact('users'));

    }

    public function edit($id){
        $user = User::findOrfail($id);
        $departments = Department::all();
        $roles = Role::all();
        return view('user.edit', compact('user', 'departments', 'roles'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
           'name' => 'required',
           'username' => 'required|unique:users,username,'.$request->id,
           'email' => 'required|email',
           'designation' => 'required',
           'specialist_in' => 'required',
           'role_id' => 'required',
           'department_id' => 'required',
        ]);

        $user = User::findOrfail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->designation = $request->designation;
        $user->specialist_in = $request->specialist_in;
        $user->role_id = $request->role_id;
        $user->department_id = $request->department_id;
        $user->status = $request->status;
        $user->save();
        return back();
    }
    public function delete($id){
        $user = User::findOrfail($id);
        $user->delete();
        return back();
    }

}
