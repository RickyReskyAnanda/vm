<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Room\RoomModel;
use App\Model\Room\RoomGalleryModel;
use App\Model\Room\RoomPackageModel;
use App\Model\Room\RoomPriceModel;
use App\Model\Room\RoomFacilityModel;
use App\Model\Venue\VenueModel;
use App\Model\Venue\VenueGalleryModel;
use File;

class RoomController extends Controller
{
    public function viewDetailRuangan($id){
    	$id = base64_decode(base64_decode($id));
    	
    	$ruangan = RoomModel::find($id);
    	$venue = VenueModel::find($ruangan->id_venue);
        $gambarVenueProfil = VenueGalleryModel::where('id_venue',$ruangan->id_venue)->where('profil','1')->first();
    	$gambarProfil = RoomGalleryModel::where('id_room',$ruangan->id_room)->where('profil','1')->first();
    	
    	return view('administrator.venue.detail-ruangan',compact('ruangan','venue','gambarProfil','gambarVenueProfil'));
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


        $huruf = 'A';

        $namaHarga[0] = 'Perjam';
        $namaHarga[1] = 'Halfday';
        $namaHarga[2] = 'Fullday';
        $namaHarga[3] = 'Fullboard';
        $namaHarga[4] = 'Perminggu';
        $namaHarga[5] = 'Perbulan';
        $namaHarga[6] = 'Pertahun';

        $satuan[0] = 'Jam';
        $satuan[1] = '4 Jam';
        $satuan[2] = '8 Jam';
        $satuan[3] = '12 Jam';
        $satuan[4] = 'Minggu';
        $satuan[5] = 'Bulan';
        $satuan[6] = 'Tahun';

        for ($i=0; $i < 7; $i++) { 
            $price = new RoomPriceModel;
            $price->id_room = $ruangan->id_room;
            $price->room_price_code = $huruf++;
            $price->time_name =  $namaHarga[$i];
            $price->satuan = $satuan[$i];
            $price->price = 0;
            $price->sts = "0";
            $price->save();
        }

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

    /*harga-harga*/
    public function postEditHargaRuangan(Request $request){
        $this->validate($request,[
            'id_ruangan'    => 'required',
            'A'          => 'nullable|numeric',
            'B'          => 'nullable|numeric',
            'C'          => 'nullable|numeric',
            'D'          => 'nullable|numeric',
            'E'          => 'nullable|numeric',
            'F'          => 'nullable|numeric',
            'G'          => 'nullable|numeric',
        ]);
        $idRoom = base64_decode(base64_decode($request->id_ruangan));

        $kode = 'A';
        $harga[0] = $request->A;
        $harga[1] = $request->B;
        $harga[2] = $request->C;
        $harga[3] = $request->D;
        $harga[4] = $request->E;
        $harga[5] = $request->F;
        $harga[6] = $request->G;

        for ($i=0; $i < 7; $i++) { 
            $data = RoomPriceModel::where('id_room',$idRoom)->where('room_price_code',$kode++)->first();
            $data->price = $harga[$i];
            $data->save();
        }

        return redirect()->back()->with('pesan','Data Harga telah diperbaharui !');

    }
    public function postShowHideHargaRuangan($id){
        $idPrice = base64_decode(base64_decode($id));

        $data = RoomPriceModel::find($idPrice);
        if($data->sts == '1')
            $data->sts = '0';
        else 
            $data->sts = '1';

        $data->save();

        return redirect()->back()->with('pesan','Data Harga telah diperbaharui !');
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
}
