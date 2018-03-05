<?php

namespace App\Http\Controllers\Administrator\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Venue\VenueTypeModel;
use App\Model\Home\HomeVenueTypeModel;

class HomeVenueTypeController extends Controller
{
    public function viewTipeVenue(){
    	$data = HomeVenueTypeModel::all();
    	return view('administrator.master-data.homepage.venue-type.venue-type',compact('data'));
    }
    public function postTambahTipeVenue(Request $request){
        $this->validate($request,[
            "tipe"    => 'required|numeric',
            "tipe_venue"    => 'required',
            "tipe_output"   => 'required|numeric'
        ]);


    	$data = new HomeVenueTypeModel;
    	$data->name = $request->tipe_venue;
        $data->type = $request->tipe;
    	$data->output_model= $request->tipe;
    	$data->sts = '0';

    	$data->save();

    	return redirect()->back()->with('pesan','Data telah disimpan!');
    }

    public function postStatusTipeVenue($id){
    	$idVenueType = base64_decode(base64_decode($id));

    	$data = HomeVenueTypeModel::find($idVenueType);
    	
    	if($data->sts=='1')
	    	$data->sts = '0';
    	else
	    	$data->sts = '1';
	    $data->save();

    	return redirect()->back()->with('pesan','Status Data telah diperbaharui');
    }

    public function postHapusTipeVenue($id){
    	$idVenueType = base64_decode(base64_decode($id));

    	HomeVenueTypeModel::destroy($idVenueType);

    	return redirect()->back()->with('pesan','Data telah dihapus');
    }
}
