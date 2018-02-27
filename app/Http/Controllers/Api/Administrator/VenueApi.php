<?php

namespace App\Http\Controllers\Api\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Venue\VenueTypeModel;
class VenueApi extends Controller
{
    public function getVenueTypeByVenueKind($venueKind){
    	return VenueTypeModel::where('venue_kind',$venueKind)->get();
    }
}
