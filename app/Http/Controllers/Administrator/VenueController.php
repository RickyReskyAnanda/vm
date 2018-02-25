<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Venue\VenueModel;
use App\Model\Venue\VenueOperationalHoursModel;
use App\Model\Venue\VenueGalleryModel;
use App\Model\Venue\VenueFacilityModel;
use App\Model\room\RoomTypeModel;
use File;

class VenueController extends Controller
{
   	public function viewVenue(){
   		$venue = VenueModel::orderBy('venue_name','asc')->get();
   		return view('administrator.venue.venue',compact('venue'));
   	}

   	public function viewDetailVenue($id){
   		$id = base64_decode(base64_decode($id));
		$detail = VenueModel::find($id);
      
		$tipeRuangan = RoomTypeModel::where('venue_type',$detail->venue_type)->where('venue_kind',$detail->venue_kind)->where('show','1')->get();
		$gambarProfil = VenueGalleryModel::where('id_venue',$detail->id_venue)->where('profil','1')->first();

		$hari[0] = 'Minggu';
		$hari[1] = 'Senin';
		$hari[2] = 'Selasa';
		$hari[3] = 'Rabu';
		$hari[4] = 'Kamis';
		$hari[5] = 'Jumat';
		$hari[6] = 'Sabtu';

   		return view('administrator.venue.'.$detail->venue_kind.'-venue',compact('detail','tipeRuangan','gambarProfil','hari'));
   	}
   		public function postTambahVenue(Request $request){
            // $text = simple_fields_value('textareaExample');
            // echo $text;
   			$this->validate($request,[
   				'jenis' => 'required',
   				'nama' => 'required',
   				'kontak' => 'nullable',
   				'nomor_kantor' => 'nullable',
   				'email_kantor' => 'nullable',
   				'alamat' => 'required',
   				'informasi' => 'required',
   			]);

   			$data = new VenueModel;
   			$data->venue_kind 		= $request->jenis;
   			$data->venue_name 		= $request->nama;
   			if(isset($request->kontak))
	   			$data->contact_number 	= $request->kontak;
	   		else
	   			$data->contact_number 	= '-';

   			if(isset($request->nomor_kantor))
	   			$data->official_number 	= $request->nomor_kantor;
	   		else
	   			$data->official_number 	= '-';
   			if(isset($request->email_kantor))
	   			$data->official_email 	= $request->email_kantor;
	   		else
	   			$data->official_email 	= '-';
   			$data->address 			= $request->alamat;
   			$data->information 		= $request->informasi;
   			$data->cooperate 		= 0;
   			$data->save();

   			for ($i=0; $i < 7; $i++) { 
	   			$jadwal = new VenueOperationalHoursModel;
	   			$jadwal->id_venue = $data->id_venue;
	   			$jadwal->day = $i;
	   			$jadwal->save();
   			}
   			return redirect('sandwich/venue/detail.'.base64_encode(base64_encode($data->id_venue)))->with('pesan','Data Venue Telah Ditambahkan');
   		}

   		public function postTambahGalleryVenue(Request $request){
   			$this->validate($request,[
   				'id_venue' => 'required',
   				'nama' => 'required',
   			]);

   			$data = new VenueGalleryModel;
   			$data->id_venue 	= base64_decode(base64_decode($request->id_venue));
   			$data->name 		= $request->nama;
   			$data->profil 		= '0';
   			$data->sts 			= '0';
   			
   			if($request->file('gambar')){
                $file = $request->file('gambar');
                
                $data->name_ex = date('YmdHis').'.'.$file->getClientOriginalExtension();
                $data->extention = $file->getClientOriginalExtension();
                $file->move(public_path('source/venue/venue/'),$data->name_ex);
                $data->url = url("source/venue/venue/".$data->name_ex);
	            $data->save();
	            return redirect()->back()->with('pesan','Gambar telah diupload');
            }
            return redirect()->back()->with('gagal','Gambar gagal terupload');
   		}
   		public function postSelectGalleryVenue(Request $request){
   			$this->validate($request,[
   				'id_venue' => 'required',
   				'profil' => 'required',
   			]);

   			$idVenue = base64_decode(base64_decode($request->id_venue));
   			$idVenueGallery = base64_decode(base64_decode($request->profil));

   			VenueGalleryModel::where('id_venue',$idVenue)->update(['profil' => '0']);

   			$gallery = VenueGalleryModel::find($idVenueGallery);
   			$gallery->profil = 1;
   			$gallery->save();

   			return redirect()->back()->with('pesan','Data galeri telah diperbaharui !');
   		}
   		public function postShowHideGalleryVenue($id){

   			$id = base64_decode(base64_decode($id));
   			$data = VenueGalleryModel::find($id);
   			if($data->sts == '1')
	   			$data->sts = '0';
	   		else
	   			$data->sts = '1';
   			$data->save();

   			return redirect()->back()->with('pesan','Data galeri telah diperbaharui !');
   		}
   		public function postHapusGalleryVenue($id){
   			$id = base64_decode(base64_decode($id));
   			$data = VenueGalleryModel::find($id);

   			if(file_exists('source/venue/venue/'.$data->name_ex)){
	   			$filename = public_path('source/venue/venue/'.$data->name_ex);
                File::delete([$filename]);
            }

            $data->delete();

            return redirect()->back()->with('pesan','Foto galeri telah dihapus');
   			
   		}

   		public function postEditOperationalVenue(Request $request){
   			$this->validate($request,[
   				'id_venue' => 'required',
   				'buka0' => 'required|numeric',
   				'buka1' => 'required|numeric',
   				'buka2' => 'required|numeric',
   				'buka3' => 'required|numeric',
   				'buka4' => 'required|numeric',
   				'buka5' => 'required|numeric',
   				'buka6' => 'required|numeric',
   				'tutup0' => 'required|numeric',
   				'tutup1' => 'required|numeric',
   				'tutup2' => 'required|numeric',
   				'tutup3' => 'required|numeric',
   				'tutup4' => 'required|numeric',
   				'tutup5' => 'required|numeric',
   				'tutup6' => 'required|numeric',
   			]);
   			$idVenue = base64_decode(base64_decode($request->id_venue));
   			for ($i=0; $i < 7; $i++) { 
	   			$jadwal = VenueOperationalHoursModel::where('id_venue',$idVenue)->where('day',$i)->first();
	   			if($i == 0){
		   			$jadwal->start = $request->buka0;
		   			$jadwal->end = $request->tutup0;
		   		}elseif($i == 1){
		   			$jadwal->start = $request->buka1;
		   			$jadwal->end = $request->tutup1;
		   		}elseif($i == 2){
		   			$jadwal->start = $request->buka2;
		   			$jadwal->end = $request->tutup2;
		   		}elseif($i == 3){
		   			$jadwal->start = $request->buka3;
		   			$jadwal->end = $request->tutup3;
		   		}elseif($i == 4){
		   			$jadwal->start = $request->buka4;
		   			$jadwal->end = $request->tutup4;
		   		}elseif($i == 5){
		   			$jadwal->start = $request->buka5;
		   			$jadwal->end = $request->tutup5;
		   		}elseif($i == 6){
		   			$jadwal->start = $request->buka6;
		   			$jadwal->end = $request->tutup6;
		   		}
		   		$jadwal->save();
   			}

   			return redirect()->back()->with('pesan','Data Jam Operasional Telah Diperbaharui !');

   		}

   		public function postTambahFasilitasVenue(Request $request){
   			$this->validate($request,[
   				'id_venue' => 'required',
   				'nama' => 'required',
   				'perhari' => 'nullable|numeric',
   				'perjam' => 'nullable|numeric',
   			]);

   			$data = new VenueFacilityModel;
   			$data->id_venue = base64_decode(base64_decode($request->id_venue));
   			$data->name = $request->nama;
   			$data->price_perday = $request->perhari;
   			$data->price_perhour = $request->perhari;
   			if($data->price_perhour == '0' && $data->price_perday == '0')
	   			$data->free = '1';
	   		else
	   			$data->free = '0';
   			$data->sts = '0';

   			$data->save();
   			return redirect()->back()->with('pesan','Data Fasilitas telah ditambahkan');

   		}
   		public function postShowHideFasilitasVenue($id){
   			$id = base64_decode(base64_decode($id));

   			$data = VenueFacilityModel::find($id);
   			if($data->sts == '1')
   				$data->sts = '0';
   			elseif($data->sts == '0')
   				$data->sts = '1';
   			$data->save();
   			return redirect()->back()->with('pesan','Data Fasilitas telah diperbaharui');
   		}
   		public function postHapusFasilitasVenue($id){
   			$id = base64_decode(base64_decode($id));

   			VenueFacilityModel::destroy($id);
   			return redirect()->back()->with('pesan','Data Fasilitas telah diperbaharui');
   		}


}
