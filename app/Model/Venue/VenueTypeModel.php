<?php

namespace App\Model\Venue;

use Illuminate\Database\Eloquent\Model;

class VenueTypeModel extends Model
{
    protected $table="venue_type";
    protected $primaryKey = "id_venue_type";

    public function getHomeType(){
    	return $this->hasMany('App\Model\Home\HomeVenueTypeModel','name','name');
    }
}
