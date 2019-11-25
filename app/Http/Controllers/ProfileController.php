<?php

namespace App\Http\Controllers;

use App\File;
use App\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        return view('profile.index', compact('user'));
    }

    public function create()
    {

    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'specialist_in' => 'required',
        ]);
//        $profile = new Profile();
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->specialist_in = $request->specialist_in;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $photo = $request->photo;
        if ($photo) {
            $name = $photo->getClientOriginalName();
            $photo->move(public_path() . '/files/', $name);
            $user->image = $name;
        }
        $user->save();
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
