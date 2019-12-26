<?php

namespace App\Http\Controllers\Auth;

use App\Activity;
use App\Http\Controllers\Controller;
use App\Project;
use Toastr;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\compare;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Auth::check()) {
            $this->redirectTo = route('admin.dashboard');
        }
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        //attempt login with usename or email
        Auth::attempt([$this->username() => $request->email, 'password' => $request->password]);
        //was any of those correct ?
        if (Auth::check()) {
            $projects = Project::all();
            $activity = new Activity();
            $activity->user_id = Auth::id();
            $activity->login_time = now('asia/dhaka');
            $activity->save();
            //send them where they are going
            Toastr::success('Successfully Logged In');

            return redirect()->intended(url('admin/dashboard'));
        }
        //Nope, something wrong during authentication
        return redirect()->back()->withErrors([
            'credentials' => 'Invalid Credential'
        ]);
    }
}
