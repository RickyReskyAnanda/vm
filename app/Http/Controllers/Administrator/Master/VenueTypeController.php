<?php

namespace App\Http\Controllers\Administrator\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Venue\VenueKindModel;
use App\Model\Venue\VenueTypeModel;

class VenueTypeController extends Controller
{
    public function viewTipeVenue(){
    	$venueKind = VenueKindModel::all();
    	$data = VenueTypeModel::all();
    	return view('administrator.master-data.venue-type.venue-type',compact('data','venueKind'));
    }
    public function postTambahTipeVenue(Request $request){
    	$this->validate($request,[
    		'jenis_venue' => 'required',
    		'nama' => 'required',
    		'metode' => 'required',
    	]);


    	$data = new VenueTypeModel;
    	$data->name = $request->nama;
    	$data->venue_kind = $request->jenis_venue;
    	$data->type = $request->metode;
    	$data->sts = '0';

    	$data->save();

    	return redirect()->back()->with('pesan','Data telah disimpan!');
    }

    public function postStatusTipeVenue($id){
    	$id = base64_decode(base64_decode($id));

    	$data = VenueTypeModel::find($id);
    	
    	if($data->sts=='1')
	    	$data->sts = '0';
    	elseif($data->sts=='0')
	    	$data->sts = '1';
	    $data->save();

    	return redirect()->back()->with('pesan','Status Data telah diperbaharui');
    }

    public function postHapusTipeVenue($id){
    	$id = base64_decode(base64_decode($id));

    	VenueTypeModel::destroy($id);

    	return redirect()->back()->with('pesan','Data telah dihapus');
    }
}
