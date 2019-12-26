<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use Toastr;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('forgot','reset','resetPassword','changePassword');
    }

    public function index(){
        $this->authorize('view', User::class);
        $users = User::all()->except([Auth::id(),1]);
        return view('user.index', compact('users'));

    }

    public function edit($id){
        $this->authorize('update', User::class);
        $user = User::findOrfail($id);
        $departments = Department::all();
        $roles = Role::all()->except(3);
        return view('user.edit', compact('user', 'departments', 'roles'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
           'name' => 'required',
           'username' => 'required|unique:users,username,'.$request->id,
           'email' => 'required|email',
           'role_id' => 'required',
           'department_id' => 'required',
        ]);

        $user = User::findOrfail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->department_id = $request->department_id;
        $user->status = $request->status;
        $user->save();
        Toastr::success('User Info updated Successfully');
        return back();
    }

    public function detail($id){
        $user = User::find($id);
        return view('user.detail', compact('user'));
    }

    public function delete($id){
        $this->authorize('delete', User::class);
        $user = User::findOrfail($id);
        $user->delete();
        $notification = array(
            'message' => 'User deleted successfully!',
            'alert-type' => 'success'
        );
        Toastr::success('User Info Deleted Successfully');
        return back()->with($notification);
    }

    public function forgot(){
        return view('user.forgot');
    }

    public function reset(Request $request){
        $user = User::where('email',$request->email)->first();
        Mail::to($user->email)->send(new ForgotPassword($user));
        Toastr::success('User Info was emailed Successfully');
        return redirect('/');
    }

    public function resetPassword($id){
        $user = User::find($id);
        return view('user.givepassword',compact('user'));
    }

    public function changePassword(Request $request,$id){
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();
        Toastr::success('User Info was emailed Successfully');
        return redirect('/');
    }

}
