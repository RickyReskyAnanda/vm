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
}
