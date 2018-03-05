<?php

namespace App\Http\Controllers\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\HomeVenueRegisterModel;

class SupportController extends Controller
{
    public function viewMenjadiPartner(){
    	return view('homepage.support.menjadi-partner');
    }
    	public function postMenjadiPartner(Request $request){
    		$this->validate($request,[
				"cp_nama"			=>"required",
				"cp_email"			=>"required|email",
				"cp_telp"			=>"required",
				"cp_posisi"			=>"required",
				"venue_nama"		=>"required",
				"venue_provinsi"	=>"required",
				"venue_kota"		=>"required",
				"venue_kecamatan"	=>"required",
                "venue_alamat"      =>"required",
                "venue_informasi"   =>"nullable",
                "area_lat"          =>"required",
				"area_lng"		    =>"required",
    		]);
    		
    		$data = new HomeVenueRegisterModel;
    		$data->cp_nama = $request->cp_nama;
    		$data->cp_email = $request->cp_email;
    		$data->cp_telp = $request->cp_telp;
    		$data->cp_posisi = $request->cp_posisi;
    		$data->venue_nama = $request->venue_nama;
    		$data->venue_provinsi = $request->venue_provinsi;
    		$data->venue_kota = $request->venue_kota;
    		$data->venue_kecamatan = $request->venue_kecamatan;
    		$data->venue_alamat = $request->venue_alamat;
            if(isset($request->venue_informasi))
                $data->venue_informasi = $request->venue_informasi;
            $data->latitude = $request->area_lat;
    		$data->langitude = $request->area_lng;
    		$data->save();

	    	return redirect()->back()->with('pesan','Terima Kasih, Informasi Anda telah disimpan. Kami akan menghubungi Anda segera.');
    	}
    public function viewTentangKami(){
    	return view('homepage.support.tentang-kami');
    }
}
