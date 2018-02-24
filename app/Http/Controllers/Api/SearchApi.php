<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\HomeVenueTypeModel;
use App\Model\Area\RegencyCooperateModel;
use App\Model\Venue\VenueModel;
class SearchApi extends Controller
{
    public function getSearchData(Request $request){
    	return $request->all();
    	$regency = strtolower($request->lokasi);
    	$venueType = strtolower($request->tipe);
    	$dataVenue = [];
    	$dataKind = '';
    	$kota = RegencyCooperateModel::where('name',$regency)->first();
    	
    	//mencari tipe venue atau room 
    	$homeVenueType = HomeVenueTypeModel::where('name',$venueType)->first();

    	if($homeVenueType->type == '0'){
    		$dataKind = 'venue';
    		$dataVenue = VenueModel::where('venue_type',$venueType)->where('city',$kota->id_regency)->get();
    		for ($i=0; $i < count($dataVenue); $i++) { 
    			$dataVenue[$i]->name = $dataVenue[$i]->venue_name;
    			$dataVenue[$i]->type = ucfirst($dataVenue[$i]->venue_type);
    			$dataVenue[$i]->lokasi = ucwords(strtolower($dataVenue[$i]->getKecamatan->name.', '.$dataVenue[$i]->getKota->name.', '.$dataVenue[$i]->getProvinsi->name));
    		}
    	}elseif($homeVenueType->type == '1'){
    		$dataKind = 'room';
    		$dataVenue = RoomModel::where('venue_type',$venueType)->where('city',$kota->id_regency)->get();
    	}


    	return response()
	            ->json(['response' => $dataVenue, 'kind' => $dataKind]);
    }
}
