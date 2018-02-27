<?php

namespace App\Model\Venue;

use Illuminate\Database\Eloquent\Model;

class VenueKindModel extends Model
{
    protected $table="venue_kind";
    protected $primaryKey = "id_venue_kind";

    public function getVenueType(){
    	return $this->hasMany('App\Model\Venue\VenueTypeModel','venue_kind','name')->where('sts','1');
    }
}
