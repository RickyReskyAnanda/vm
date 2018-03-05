<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function viewUser(){
    	$data = User::paginate(20);
    	return view('administrator.users.users',compact('data'));
    }
}
