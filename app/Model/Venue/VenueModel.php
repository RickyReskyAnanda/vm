<?php

namespace App\Model\Venue;

use Illuminate\Database\Eloquent\Model;

class VenueModel extends Model
{
    protected $table = 'venue';
    protected $primaryKey = 'id_venue';

    public function getRoom(){
    	return $this->hasMany('App\Model\Room\RoomModel','id_venue','id_venue');
    }

    //gallery
    public function getGallery(){
    	return $this->hasMany('App\Model\Venue\VenueGalleryModel','id_venue','id_venue');
    }

    public function getOperationalHours(){
    	return $this->hasMany('App\Model\Venue\VenueOperationalHoursModel','id_venue','id_venue');
    }

    public function getFacility(){
    	return $this->hasMany('App\Model\Venue\VenueFacilityModel','id_venue','id_venue');
    }


    //lokasi
    public function getProvinsi(){
        return $this->hasOne('App\Model\Area\AreaProvinceModel','id','province');
    }
    public function getKota(){
        return $this->hasOne('App\Model\Area\AreaRegencyModel','id','city');
    }
    public function getKecamatan(){
        return $this->hasOne('App\Model\Area\AreaDistrictModel','id','district');
    }
}
