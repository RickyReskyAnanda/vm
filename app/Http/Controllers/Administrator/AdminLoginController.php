<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Admin;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getAdminLogin(){
        
        if (auth()->guard('admin')->user()) return redirect('sandwich/beranda');
        return view('administrator.auth.login');
    }

    public function adminAuth(Request $request){
        $this->validate($request, [
            'email' => 'required|min:6|email|string',
            'password' => 'required|min:6|string',
        ]);

        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('sandwich/beranda');
        }else{
            return redirect()->back()->with('error', 'Email atau Password Anda salah.');
        }
    }

    public function logout(){
        auth()->guard('admin')->logout();
        return redirect('sandwich');
    }
}