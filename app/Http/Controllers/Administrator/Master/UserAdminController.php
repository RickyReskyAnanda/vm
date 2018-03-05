<?php

namespace App\Http\Controllers\Administrator\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class UserAdminController extends Controller
{
    public function viewUser(){
    	$data = Admin::paginate(20);
    	return view('administrator.master-data.user-admin.user-admin',compact('data'));
    }

    public function viewAddUser(){
    	return view('administrator.master-data.user-admin.tambah-user-admin');
    }

    public function getToken() {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }
    public function postAddUser(Request $request){
    	$this->validate($request,[
    		'name' => 'required',
    		'email' => 'required|email|unique:admins',
    		'telp' => 'required',
    		'posisi' => 'required',
    		'level' => 'required',
    	]);

    	$data = new Admin;
    	$data->name = $request->name;
    	$data->email = $request->email;
    	$data->phone = $request->telp;
    	$data->position = $request->posisi;
    	$data->level = $request->level;
    	$data->active = 1;
    	$data->password = bcrypt('sandwich');
    	$data->key_pw = base64_encode('sandwich');
    	$data->activation_key = $this->getToken();
    	$data->save();

    	return redirect('sandwich/master-data/user-admin')->with('pesan','Data User telah ditambahkan !');
    }


	public function viewEditUser($id){
		$detail = Admin::find($id);
    	return view('administrator.master-data.user-admin.edit-user-admin',compact('detail'));
    }
    public function postEditUser(Request $request){
    	$this->validate($request,[
    		'id' => 'required|numeric',
    		'name' => 'required',
    		'email' => 'required|email',
    		'telp' => 'required',
    		'posisi' => 'required',
    		'level' => 'required',
    		'active' => 'required',
    	]);

    	$data = Admin::find($request->id);
    	$data->name = $request->name;
    	$data->email = $request->email;
    	$data->phone = $request->telp;
    	$data->position = $request->posisi;
    	$data->level = $request->level;
    	$data->active = $request->active;
    	$data->save();

    	return redirect('sandwich/master-data/user-admin')->with('pesan','Data User telah diperbaharui !');
    }

    public function postDeleteUser($id){
    	Admin::destroy($id);
    	return redirect('sandwich/master-data/user-admin')->with('pesan','Data User telah dihapus !');
    }
}
