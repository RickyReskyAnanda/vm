<?php

namespace App\Http\Controllers\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Setting\SettingModel;
use App\Model\Area\RegencyCooperateModel;
use App\Model\Home\HomeVenueTypeModel;
use App\Model\Venue\VenueModel;
use App\Model\Room\RoomModel;

class DetailVenueController extends Controller
{
    public function viewVenue(Request $request,$type,$nama,$id){
    	
    	//data setting
    	$setting = SettingModel::find(1);
    	//data pencarian
    	$regencyCooperate = RegencyCooperateModel::orderBy('urutan','asc')->get();
    	$venueType = HomeVenueTypeModel::orderBy('sort_type','asc')->get();

    	$regency = strtolower($request->lokasi);
    	$type = strtolower($request->tipe);
    	$id_venue = base64_decode(base64_decode($id));

    	$homeVenueType = HomeVenueTypeModel::where('name',$type)->first();//mencari tipe venue atau room 
    	if($homeVenueType->type == '0')
    		$detail = VenueModel::find($id_venue);
    	elseif($homeVenueType->type == '1')
    		$detail = RoomModel::find($id_venue);
    	if($homeVenueType->output_model == '0')
	    	return view('homepage.detail-venue-0',compact('request','setting','regencyCooperate','venueType','detail'));
    	elseif($homeVenueType->output_model == '1')
	    	return view('homepage.detail-venue-1',compact('request','setting','regencyCooperate','venueType','detail'));

    }
}
