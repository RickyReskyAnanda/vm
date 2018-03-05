<?php

namespace App\Http\Controllers\Administrator\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Room\RoomTypeModel;
class RoomTypeController extends Controller
{
    public function viewTipeRuangan(){
    	$data = RoomTypeModel::all();
    	return view('administrator.master-data.room-type.room-type',compact('data'));
    }

    public function postStatusTipeRuangan($id){
    	$idRoomType = base64_decode(base64_decode($id));
    	$data = RoomTypeModel::find($idRoomType);

    	if($data->sts == '1')
	    	$data->sts = '0' ;
    	else
	    	$data->sts = '1' ;
	    $data->save();

    	return redirect()->back()->with('pesan','Status data telah diperbaharui!');

    }

    public function postTambahTipeRuangan(Request $request){
    	$this->validate($request,[
    		'name' => 'required',
    		'tag'  => 'required'
    	]);

    	$data = new RoomTypeModel;
    	$data->type_name = ucwords($request->name);
    	$data->tag = $request->tag;
    	$data->save();

    	return redirect()->back()->with('pesan','Data telah ditambahkan!');
    }
}
