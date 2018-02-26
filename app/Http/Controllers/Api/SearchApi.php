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
    	// setup data
    	$regency = strtolower($request->lokasi);
    	$venueType = strtolower($request->tipe);
		$district=[];
    	if(isset($request->kecamatan)){
	    	$district = $request->kecamatan;
		    $district = explode(',', $district);

		    for ($i=0; $i < count($district); $i++) { 
		    	$district[$i] = base64_decode(base64_decode($district[$i])); 
		    }
		}

    	$dataVenue = [];
    	$dataKind = '';
    	$urutan = $request->urutan;

		$fieldUrutan='name';
		$valueUrutan='asc';

    	if($urutan == '1'){
    		$fieldUrutan='name';
			$valueUrutan='asc';
    	}

    	// penambahan else if dikondisikan
    	// elseif($urutan == 2){
    	// }
    	
    	// mulai mencari data
    	$kota = RegencyCooperateModel::where('name',$regency)->first();//mencari id_regency 
    	$homeVenueType = HomeVenueTypeModel::where('name',$venueType)->first();//mencari tipe venue atau room 

    	if($homeVenueType->type == '0'){

    		$dataKind = 'venue'; // jenisnya yg akan diturunkan
    		//mengambil data venue
    		if(count($district)<1){
	    		$dataVenue = VenueModel::where('venue_type',$venueType)
	    								->where('city',$kota->id_regency)
	    								->orderBy($dataKind.'_'.$fieldUrutan,$valueUrutan)
	    								->get();
    		}elseif(count($district)>=1){
	    		$dataVenue = VenueModel::where('venue_type',$venueType)
	    								->where('city',$kota->id_regency)
	    								->whereIn('district',$district)
	    								->orderBy($dataKind.'_'.$fieldUrutan,$valueUrutan)
	    								->get();
    		}
    		

    		//mengelola dan menyusun data sebelum di respon balik
    		for ($i=0; $i < count($dataVenue); $i++) { 
    			$dataVenue[$i]->name = $dataVenue[$i]->venue_name;
    			$dataVenue[$i]->type = ucfirst($dataVenue[$i]->venue_type);
                $dataVenue[$i]->lokasi = ucwords(strtolower($dataVenue[$i]->getKecamatan->name.', '.$dataVenue[$i]->getKota->name.', '.$dataVenue[$i]->getProvinsi->name));
                $dataVenue[$i]->url_venue = url('venue/'.str_replace(' ', '-',strtolower($dataVenue[$i]->type)).'/'.str_replace(' ', '-',strtolower($dataVenue[$i]->name)).'.'.base64_encode(base64_encode($dataVenue[$i]->id_venue))).'?lokasi='.str_replace(' ', '+',$request->lokasi).'&tipe='.str_replace(' ', '+',$request->tipe);
                if(isset($dataVenue[$i]->getProfil->url))
        			$dataVenue[$i]->image_profil = $dataVenue[$i]->getProfil->url;
            }

    	}elseif($homeVenueType->type == '1'){
    		$dataKind = 'room';
    		$dataVenue = RoomModel::where('venue_type',$venueType)->where('city',$kota->id_regency)->get();
    	}

    	return response()
	            ->json(['response' => $dataVenue, 'kind' => $dataKind]);
    }
}
