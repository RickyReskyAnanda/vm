<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Room\RoomModel;
use App\Model\Room\RoomGalleryModel;
use App\Model\Room\RoomPackageModel;
use App\Model\Room\RoomFacilityModel;
use App\Model\Room\RoomTypeModel;
use App\Model\Venue\VenueModel;
use App\Model\Venue\VenueGalleryModel;
use File;

class RoomController extends Controller
{
    public function viewDetailRuangan($id){
    	$id = base64_decode(base64_decode($id));
    	$roomType = RoomTypeModel::all();
        
        $ruangan = RoomModel::find($id);
    	$venue = VenueModel::find($ruangan->id_venue);
        $gambarVenueProfil = VenueGalleryModel::where('id_venue',$ruangan->id_venue)->where('profil','1')->first();
    	$gambarProfil = RoomGalleryModel::where('id_room',$ruangan->id_room)->where('profil','1')->first();
    	
    	return view('administrator.venue.detail-ruangan',compact('ruangan','venue','gambarProfil','gambarVenueProfil','roomType'));
    }

    public function postTambahRuangan(Request $request){
    	$this->validate($request,[
    		'id_venue' 	=> 'required',
    		'tipe' 		=> 'required',
    		'nama' 		=> 'required',
    		'kode' 		=> 'required',
    		'kapasitas' => 'required',
    		'deskripsi' => 'nullable',
    	]);

    	$idVenue = base64_decode(base64_decode($request->id_venue));

    	$ruangan = new RoomModel;
    	$ruangan->id_venue = $idVenue;
    	$ruangan->room_type = $request->tipe;
    	$ruangan->name = $request->nama;
    	$ruangan->room_code = $request->kode;
    	$ruangan->capacity = $request->kapasitas;
    	$ruangan->description = $request->deskripsi;
    	$ruangan->is_published = 0;
    	$ruangan->is_verified = 1;
    	$ruangan->save();

    	return redirect('sandwich/venue/ruangan/detail.'.base64_encode(base64_encode($ruangan->id_room)))->with('pesan','Data Ruangan Telah Ditambahkan');
    }


    /*paket*/
    public function postTambahPaketRuangan(Request $request){
        $this->validate($request,[
            'id_ruangan'    => 'required',
            'nama'          => 'required',
            'informasi'     => 'required',
            'pembayaran'    => 'required',
            'dp'            => 'required|numeric',
            'harga'         => 'required|numeric',
            'charge'        => 'required',
            'mulai'         => 'required',
            'selesai'       => 'required',
        ]);

        $idRoom = base64_decode(base64_decode($request->id_ruangan));
        $room = RoomModel::find($idRoom);
        $data = new RoomPackageModel;
        $data->id_room = $idRoom;
        $data->id_venue = $room->id_venue;
        $data->name = $request->nama;
        $data->information = $request->informasi;
        $data->payment_rule = $request->pembayaran;
        $data->down_payment = $request->dp;
        $data->price = $request->harga;
        $data->charge = $request->charge;
        $data->start = $request->mulai;
        $data->end = $request->selesai;
        $data->save();



        return redirect()->back()->with('pesan','Data Paket telah ditambahkan !');
    }
    public function postHapusPaketRuangan($id){
        $idPaket = base64_decode(base64_decode($id));

        RoomPackageModel::destroy($idPaket);

        return redirect()->back()->with('pesan','Data Paket telah dihapus !');
    }
    public function postShowHidePaketRuangan($id){
        $idPaket = base64_decode(base64_decode($id));

        $data = RoomPackageModel::find($idPaket);
        if($data->sts == '1')
            $data->sts = '0';
        else 
            $data->sts = '1';

        $data->save();

        return redirect()->back()->with('pesan','Data Paket telah diperbaharui !');
    }

    /*Galery*/
    public function postTambahGalleryRuangan(Request $request){
            $this->validate($request,[
                'id_ruangan' => 'required',
                'nama' => 'required',
            ]);

            $idRoom     = base64_decode(base64_decode($request->id_ruangan));
            $ruangan = RoomModel::find($idRoom);

            $data = new RoomGalleryModel;
            $data->id_room     = $ruangan->id_room;
            $data->id_venue     = $ruangan->id_venue;
            $data->name         = $request->nama;
            $data->profil       = '0';
            $data->sts          = '0';
            
            if($request->file('gambar')){
                $file = $request->file('gambar');
                
                $data->name_ex = date('YmdHis').'.'.$file->getClientOriginalExtension();
                $data->extention = $file->getClientOriginalExtension();
                $file->move(public_path('source/venue/room/'),$data->name_ex);
                $data->url = url("source/venue/room/".$data->name_ex);
                $data->save();
                return redirect()->back()->with('pesan','Gambar telah diupload');
            }
            return redirect()->back()->with('gagal','Gambar gagal terupload');
        }
        public function postSelectGalleryRuangan(Request $request){
            $this->validate($request,[
                'id_ruangan' => 'required',
                'profil' => 'required',
            ]);

            $idRoom = base64_decode(base64_decode($request->id_ruangan));
            $idRoomGallery = base64_decode(base64_decode($request->profil));

            RoomGalleryModel::where('id_room',$idRoom)->update(['profil' => '0']);

            $gallery = RoomGalleryModel::find($idRoomGallery);
            $gallery->profil = 1;
            $gallery->save();

            return redirect()->back()->with('pesan','Data galeri telah diperbaharui !');
        }
        public function postShowHideGalleryRuangan($id){

            $id = base64_decode(base64_decode($id));
            $data = RoomGalleryModel::find($id);
            if($data->sts == '1')
                $data->sts = '0';
            else
                $data->sts = '1';
            $data->save();

            return redirect()->back()->with('pesan','Data galeri telah diperbaharui !');
        }
        public function postHapusGalleryRuangan($id){
            $id = base64_decode(base64_decode($id));
            $data = RoomGalleryModel::find($id);

            if(file_exists('source/venue/room/'.$data->name_ex)){
                $filename = public_path('source/venue/room/'.$data->name_ex);
                File::delete([$filename]);
            }

            $data->delete();

            return redirect()->back()->with('pesan','Foto galeri telah dihapus');
            
        }

        /*fasilitas*/
        public function postTambahFasilitasRuangan(Request $request){
            $this->validate($request,[
                'id_ruangan' => 'required',
                'nama' => 'required',
                'perhari' => 'nullable|numeric',
                'perjam' => 'nullable|numeric',
            ]);
            $idRoom = base64_decode(base64_decode($request->id_ruangan));
            $ruangan = RoomModel::find($idRoom);

            $data = new RoomFacilityModel;
            $data->id_room = $idRoom;
            $data->id_venue = $ruangan->id_venue;
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
        public function postShowHideFasilitasRuangan($id){
            $id = base64_decode(base64_decode($id));

            $data = RoomFacilityModel::find($id);
            if($data->sts == '1')
                $data->sts = '0';
            else
                $data->sts = '1';
            $data->save();
            return redirect()->back()->with('pesan','Data Fasilitas telah diperbaharui');
        }
        public function postHapusFasilitasRuangan($id){
            $id = base64_decode(base64_decode($id));

            RoomFacilityModel::destroy($id);
            return redirect()->back()->with('pesan','Data Fasilitas telah diperbaharui');
        }

        /*penggunaan*/
        public function postEditPenggunaanRuangan(Request $request){

            $this->validate($request,[
                'id_ruangan' => 'required',
                'penggunaan' => 'nullable',
            ]);

            $idRoom = base64_decode(base64_decode($request->id_ruangan));

            if(isset($request->penggunaan)){
                $data = RoomModel::find($idRoom);
                $data->room_usage = $request->penggunaan;
                $data->save();
                return redirect()->back()->with('pesan','Data penggunaan ruangan telah diperbaharui');
            }
            return redirect()->back()->with('pesan','Data penggunaan ruangan tidak memiliki perubahan');
        }

    public function postEditPengaturanRuangan(Request $request){
        $this->validate($request,[
            'id_room' => 'required',
            'id_venue' => 'required',
            'name' => 'required',
            'room_code' => 'nullable',
            'room_type' => 'required',
            'capacity' => 'nullable|numeric',
            'room_ceiling' => 'nullable|numeric',
            'room_long' => 'nullable|numeric',
            'room_width' => 'nullable|numeric',
            'room_notable' => 'nullable',
            'description' => 'nullable',
            'sts' => 'required|numeric',
            'tag' => 'nullable',
        ]);

        $id_room = base64_decode(base64_decode($request->id_room));
        $id_venue = base64_decode(base64_decode($request->id_venue));
        $data = RoomModel::where('id_room',$id_room)->where('id_venue',$id_venue)->first();
        $data->name = $request->name;
        $data->room_code = $request->room_code;
        $data->room_type = $request->room_type;
        $data->capacity = $request->capacity;
        $data->room_ceiling = $request->room_ceiling;
        $data->room_long = $request->room_long;
        $data->room_width = $request->room_width;
        $data->room_notable = $request->room_notable;
        $data->description = $request->description;
        $data->sts = $request->sts;
        $data->tag = $request->tag;
        $data->save();

        return redirect()->back()->with('pesan','Data Pengaturan telah disimpan!');
    }
}
