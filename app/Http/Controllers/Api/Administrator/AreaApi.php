<?php

namespace App\Http\Controllers\Api\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Area\AreaRegencyModel;
use App\Model\Area\AreaDistrictModel;

class AreaApi extends Controller
{
    public function getCityByProvince($id){
    	$data = AreaRegencyModel::where('province_id',$id)->get();

    	for ($i=0; $i < count($data); $i++) { 
    		$data[$i]->name = ucwords(strtolower($data[$i]->name));
    	}

    	return $data;
    }

    public function getDistrictByCity($id){
    	$data = AreaDistrictModel::where('regency_id',$id)->get();

    	for ($i=0; $i < count($data); $i++) { 
    		$data[$i]->name = ucwords(strtolower($data[$i]->name));
    	}
    	return $data;
    }
}
