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
            'username' => 'required|min:6|max:32',
            'password' => 'required|min:6|max:32',
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password],true))
        {
            return redirect('mahasiswa');
        }
        else{
            return redirect()->back()->with('pesan', 'Username atau Password Anda salah.');
        }
    }

    public function logout(){
        
        Auth::logout();
        return redirect('/');
    }
}
