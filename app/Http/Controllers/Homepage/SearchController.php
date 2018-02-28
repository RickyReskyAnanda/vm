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
        //mengubah id ke string untuk bisa dienkripsi
        for ($i=0; $i < count($kecamatan); $i++) { 
            $kecamatan[$i]->id_district = base64_encode(base64_encode(strval($kecamatan[$i]->id)));
        }

        $type = HomeVenueTypeModel::where('name',$request->tipe)->first();
        if(!isset($type->output_model))
            return redirect()->back();
        if($type->output_model == '0')
            return view('homepage.search-1',compact('regencyCooperate','venueType','setting','request','kecamatan'));
        else
        	return view('homepage.search-0',compact('regencyCooperate','venueType','setting','request','kecamatan'));
    }

    
}
