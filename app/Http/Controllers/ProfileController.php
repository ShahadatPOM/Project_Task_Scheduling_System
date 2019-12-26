<?php

namespace App\Http\Controllers;

use App\File;
use App\Profile;
use App\User;
use Toastr;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        $profile = Profile::find($id);
        return view('profile.index', compact('user', 'profile'));
    }

    public function create()
    {

    }

    public function store(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $profile = Profile::where('user_id', $id)->first();
        $profile->mobile = $request->mobile;
        $profile->address = $request->address;
        $profile->designation = $request->designation;
        $profile->education = $request->education;
        $profile->specialist_in = $request->specialist_in;
        $profile->save();
        $file = $request->photo;
        if($file) {
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/files/', $name);
            $profile->image = $name;
            $profile->save();
        }
        Toastr::success('profile info added successfully','Success!');

        return back();
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
