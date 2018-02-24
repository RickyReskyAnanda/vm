<?php

namespace App\Http\Controllers\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Setting\SettingModel;
use App\Model\Area\RegencyCooperateModel;
use App\Model\Area\AreaDistrictModel;
use App\Model\Home\HomeVenueTypeModel;

class SearchController extends Controller
{
    public function viewSearch(Request $request){
    	//data setting
    	$setting = SettingModel::find(1);
    	//data pencarian
    	$regencyCooperate = RegencyCooperateModel::orderBy('urutan','asc')->get();
    	$venueType = HomeVenueTypeModel::orderBy('sort_type','asc')->get();

    	//data untuk filter
    	$regency = RegencyCooperateModel::where('name',$request->lokasi)->first();
    	// return $regency;
    	$kecamatan = [];
    	if(isset($regency->id_regency)){
	    	$kecamatan = AreaDistrictModel::where('regency_id',$regency->id_regency)->get(); 
    	}
    	
    	

    	return view('homepage.search-1',compact('regencyCooperate','venueType','setting','request','kecamatan'));
    }

    
}
