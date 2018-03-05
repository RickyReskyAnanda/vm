<?php

namespace App\Http\Controllers\Api\Administrator\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Room\RoomTypeModel;
use App\Model\Venue\VenueTypeModel;

class HomeApi extends Controller
{
    public function getType($tipe){
    	$data=[];
    	if($tipe=='1')
    		$data = RoomTypeModel::all();
    	elseif($tipe=='0')
    		$data = VenueTypeModel::all();

    	return $data;
    }
}
