<?php

namespace App\Model\Room;

use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    protected $table = "room";
    protected $primaryKey = "id_room";

    public function getPackage(){
    	return $this->hasMany('App\Model\Room\RoomPackageModel','id_room','id_room');
    }
    public function getGallery(){
    	return $this->hasMany('App\Model\Room\RoomGalleryModel','id_room','id_room');
    }
    public function getPrice(){
    	return $this->hasMany('App\Model\Room\RoomPriceModel','id_room','id_room');
    }
    public function getFacility(){
    	return $this->hasMany('App\Model\Room\RoomFacilityModel','id_room','id_room');
    }
    public function getProfil(){
        return $this->hasOne('App\Model\Room\RoomGalleryModel','id_room','id_room')->where('profil','1');
    }

    //
    public function getVenue(){
        return $this->hasOne('App\Model\Venue\VenueModel','id_venue','id_venue');
    }

    public function getReview(){
        return $this->hasMany('App\Model\Review\ReviewModel','id','id_room')->where('kind','room');
    }
}
