<?php

namespace App\Http\Controllers\Administrator\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Venue\VenueKindModel;

class VenueKindController extends Controller
{
    public function viewJenisVenue(){
    	$data = VenueKindModel::all();
    	return view('administrator.master-data.venue-kind.venue-kind',compact('data'));
    }
    public function postTambahJenisVenue(Request $request){
    	$this->validate($request,[
    		'nama' => 'required'
    	]);

    	$data = new VenueKindModel;
    	$data->name = $request->nama;
    	$data->sts = '0';
    	$data->save();

    	return redirect()->back()->with('pesan','Data telah disimpan!');
    }

    public function postStatusJenisVenue($id){
    	$id = base64_decode(base64_decode($id));

    	$data = VenueKindModel::find($id);
    	
    	if($data->sts=='1')
	    	$data->sts = '0';
    	elseif($data->sts=='0')
	    	$data->sts = '1';
	    $data->save();

    	return redirect()->back()->with('pesan','Status Data telah diperbaharui');
    }

    public function postHapusJenisVenue($id){
    	$id = base64_decode(base64_decode($id));

    	VenueKindModel::destroy($id);

    	return redirect()->back()->with('pesan','Data telah dihapus');
    }
}
