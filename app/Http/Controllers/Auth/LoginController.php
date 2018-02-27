<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|min:6|email|string',
            'password' => 'required|min:6|string',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'active' => '1'],true))
        {
            Auth::login(Auth::user(), true);
            return redirect()->back();
        }
        else{
            return redirect()->back()->with('log_error', 'Email atau Password Anda salah.');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
