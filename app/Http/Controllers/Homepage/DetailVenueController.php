<?php

namespace App\Http\Controllers\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Setting\SettingModel;
use App\Model\Area\RegencyCooperateModel;
use App\Model\Home\HomeVenueTypeModel;
use App\Model\Venue\VenueModel;
use App\Model\Room\RoomModel;
use App\Model\Review\ReviewModel;

class DetailVenueController extends Controller
{
    public function viewVenue(Request $request,$type,$nama,$id){
    	
    	//data setting
    	$setting = SettingModel::find(1);
    	//data pencarian
    	$regencyCooperate = RegencyCooperateModel::orderBy('urutan','asc')->get();
    	$venueType = HomeVenueTypeModel::orderBy('sort_type','asc')->get();

    	$regency = strtolower($request->lokasi);
    	$type = strtolower($request->tipe);
    	$id_venue = base64_decode(base64_decode($id));

    	$homeVenueType = HomeVenueTypeModel::where('name',$type)->first();//mencari tipe venue atau room 
        if($homeVenueType->type == '0'){
            $detail = VenueModel::find($id_venue);
            $detail->venue_terdekat = VenueModel::where('venue_type',$type)->where('district',$detail->district)->where('id_venue','!=',$detail->id_venue)->get();
            if(isset($detail->venue_usage))
            $detail->venue_usage = explode(',',$detail->venue_usage);

            //looping untuk set link menu venue terdekat
            for ($i=0; $i < count($detail->venue_terdekat); $i++) { 
                $detail->venue_terdekat[$i]->name = $detail->venue_terdekat[$i]->venue_name;
                $detail->venue_terdekat[$i]->type = ucfirst($detail->venue_terdekat[$i]->venue_type);
                $detail->venue_terdekat[$i]->lokasi = ucwords(strtolower($detail->venue_terdekat[$i]->getKecamatan->name.', '.$detail->venue_terdekat[$i]->getKota->name.', '.$detail->venue_terdekat[$i]->getProvinsi->name));
                $detail->venue_terdekat[$i]->url_venue = url('venue/'.str_replace(' ', '-',strtolower($detail->venue_terdekat[$i]->type)).'/'.str_replace(' ', '-',strtolower($detail->venue_terdekat[$i]->name)).'_'.base64_encode(base64_encode(strval($detail->venue_terdekat[$i]->id_venue)))).'?lokasi='.str_replace(' ', '+',$request->lokasi).'&tipe='.str_replace(' ', '+',$request->tipe);
            }

            // $detail->breadcump = VenueModel::where('venue_type',$venueType)->where('district',$detail->district)->get();
        }elseif($homeVenueType->type == '1'){
            $detail = RoomModel::find($id_venue);
            $detail->room_venue = RoomModel::where('id_venue','=',$detail->id_venue)->where('id_room','!=',$detail->id_room)->get();

            if(isset($detail->room_usage))
            $detail->room_usage = explode(',',$detail->room_usage);

            //looping untuk set link menu venue terdekat
            for ($i=0; $i < count($detail->room_venue); $i++) { 
                $detail->room_venue[$i]->type = ucfirst($detail->room_venue[$i]->room_type);

                $detail->room_venue[$i]->lokasi = ucwords(strtolower($detail->room_venue[$i]->getVenue->getKecamatan->name.', '.$detail->room_venue[$i]->getVenue->getKota->name.', '.$detail->room_venue[$i]->getVenue->getProvinsi->name));
                $detail->room_venue[$i]->url_venue = url('venue/'.str_replace(' ', '-',strtolower($detail->room_venue[$i]->type)).'/'.str_replace(' ', '-',strtolower($detail->room_venue[$i]->name)).'_'.base64_encode(base64_encode(strval($detail->room_venue[$i]->id_room)))).'?lokasi='.str_replace(' ', '+',$request->lokasi).'&tipe='.str_replace(' ', '+',$request->tipe);
            }
        }
        
    	if($homeVenueType->type == '0'){
            return view('homepage.detail-venue-1',compact('request','setting','regencyCooperate','venueType','detail'));
        }elseif($homeVenueType->type == '1'){
            return view('homepage.detail-venue-2',compact('request','setting','regencyCooperate','venueType','detail'));
        }
    }


    public function postReview(Request $request){
        $this->validate($request,[
            'id' => 'required',
            'kind' => 'required',
            'review' => 'required'
        ]);

        $review = new ReviewModel;
        $review->komentar = $request->review;
        $review->kind = $request->kind;
        $review->name = auth()->user()->name;
        $review->id = base64_decode(base64_decode($request->id));
        $review->save();

        return redirect()->back();
    }
}
