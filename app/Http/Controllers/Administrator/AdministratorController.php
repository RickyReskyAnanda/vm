<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministratorController extends Controller
{
    public function viewBeranda(){
    	return view('administrator.beranda.beranda');
    }
}
