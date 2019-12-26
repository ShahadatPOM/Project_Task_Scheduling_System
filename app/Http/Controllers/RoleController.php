<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Role;
use Toastr;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function create(){
        return view('role.create');
    }

    public function store(Request $request){
        $this->validate($request, [
           'name' => 'required|unique:roles'
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->save();
        Toastr::success('Role created Successfully');

        return back();
    }
}
