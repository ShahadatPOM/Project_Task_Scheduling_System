<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AccountCredentials;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Mail;
use Toastr;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo;

    public function __construct()
    {
        $this->redirectTo = route('register');
        $this->middleware(['auth']);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }

    protected function create(array $data)
    {
        $request = app('request');
        $password = '12345';
        $user = User::create([
            'role_id' => $data['role_id'],
            'department_id' => $data['department_id'],
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'status' => $data['status'],
            'password' => bcrypt($password),
        ]);
        $profile = Profile::create([
            'user_id' => $user->id,
        ]);
        $array = ['email'=>$user['email'],'password'=>$password];
        Mail::to($request->email)->send(new AccountCredentials($array));
        Toastr::success('Account was Created and creadential has been sent to email');
        return back();
    }
}
