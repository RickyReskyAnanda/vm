<!DOCTYPE html>
<html lang="en">

  <head>
  
    @include('homepage.library.header')
    <style>
      #map {
        width: 100%;
        height: 400px;
        background-color: grey;
      }
    </style>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    @include('homepage.navbar-home')

    <section class="mt-5" >
      <div class="container">
        @if(session('pesan'))
          <div class="alert alert-success alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              {{session('pesan')}}
          </div>
        @endif
        <div class="row">
          <div class="col-lg-12">
            <h3 class="section-heading">Menjadi Partner</h3>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <h5 class="mb-2 text-danger">Contact Person</h5>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <form action="{{url('menjadi-partner')}}" method="post" class="form-horizontal">
              {{csrf_field()}}
              <div class="row form-group">
                <label class="col-form-label text-right  col-md-3 col-sm-3 col-xs-12">Name :</label>
                <input class="form-control col-md-8 col-sm-8 col-xs-12" placeholder="Nama" aria-describedby="basic-addon1" name="cp_nama" required="" type="text">
              </div>
              <div class="row form-group">
                <label class="col-form-label text-right  col-md-3 col-sm-3 col-xs-12">Email :</label>
                <input class="form-control col-md-8 col-sm-8 col-xs-12" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" placeholder="Email" aria-describedby="basic-addon1" name="cp_email" required="" type="email">
              </div>
              <div class="row form-group">
                <label class="col-form-label text-right  col-md-3 col-sm-3 col-xs-12">No. HP / Telepon :</label>
                <input class="form-control col-md-8 col-sm-8 col-xs-12" placeholder="No HP/telpon" aria-describedby="basic-addon1" name="cp_telp" required="" type="text">
              </div>
              <div class="row form-group">
                <label class="col-form-label text-right  col-md-3 col-sm-3 col-xs-12">Sebagai :</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio1" name="cp_posisi" checked="checked" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio1">Owner</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio2" name="cp_posisi" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio2">Operator</label>
                    </div>
                </div>
              </div>
              <hr>
              <div class="row form-group">
                <label class="col-form-label text-right  col-md-3 col-sm-3 col-xs-12">Nama Venue :</label>
                <input class="form-control col-md-8 col-sm-8 col-xs-12" placeholder="Nama venue" aria-describedby="basic-addon1" name="venue_nama" required="" type="text">
              </div>
              <div class="row form-group">
                <label class="col-form-label text-right  col-md-3 col-sm-3 col-xs-12">Provinsi :</label>
                <input name="venue_provinsi" class="form-control col-md-8 col-sm-8 col-xs-12" placeholder="Nama provinsi" required="" type="text">
              </div>
              <div class="row form-group">
                <label class="col-form-label text-right  col-md-3 col-sm-3 col-xs-12">Kota/Kabupaten :</label>
                <input name="venue_kota" class="form-control col-md-8 col-sm-8 col-xs-12" placeholder="Nama kota/kabupaten" required="" type="text">
              </div>
              <div class="row form-group">
                <label class="col-form-label text-right  col-md-3 col-sm-3 col-xs-12">Kecamatan :</label>
                <input name="venue_kecamatan" class="form-control col-md-8 col-sm-8 col-xs-12" placeholder="Nama kecamatan" required="" type="text">
              </div>
              
              <div class="row form-group">
                <label class="col-form-label text-right  col-md-3 col-sm-3 col-xs-12">Alamat Venue :</label>
                <input name="venue_alamat" class="form-control col-md-8 col-sm-8 col-xs-12" placeholder="Alamat venue" required="" type="text">
              </div>
              <div class="row form-group">
                <label class="col-form-label text-right  col-md-3 col-sm-3 col-xs-12">Deskripsi Venue :</label>
                <textarea name="venue_informasi" class="form-control col-md-8 col-sm-8 col-xs-12" placeholder="Jenis Venue.. Fasilitas.. menyewakan venue/ruangan/meja.. dll."></textarea>
              </div>
              <div class="row form-group">
                <label class="col-form-label text-right  col-md-3 col-sm-3 col-xs-12">Lokasi :</label>
                <div id="map" class="col-md-8"></div>
              </div>
              <div class="row form-group">
                <label class="col-form-label text-right  col-md-3 col-sm-3 col-xs-12"></label>
                <input name="area_lat" class="form-control col-md-4 col-sm-4 col-xs-6 mx-1" placeholder="Latitude" required="" type="text">
                <input name="area_lng" class="form-control col-md-4 col-sm-4 col-xs-6 mx-1" placeholder="Langitude" required="" type="text">
              </div>
              <div class="row form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 offset-xs-3 offset-sm-3 offset-md-3 offset-lg-3 offset-xl-3">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div> 
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="section-heading">Layanan Reservasi & Booking</h2>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 text-center">
            <div class="service-box mt-5 mx-auto">
              <img src="{{asset('images/home/icon/resort.png')}}">
              <h3 class="mb-3">Venue</h3>
              <p class="text-muted mb-0">Cafe, Restoran, Working Space, Kantor, Gedung Serbaguna, Balai Diklat.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 text-center">
            <div class="service-box mt-5 mx-auto">
              <img src="{{asset('images/home/icon/meeting-room.png')}}">
              <h3 class="mb-3">Ruangan</h3>
              <p class="text-muted mb-0">Meeting Room, Conference Room, Ball Room, Private Dining Room</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 text-center">
            <div class="service-box mt-5 mx-auto">
              <img src="{{asset('images/home/icon/cafe.png')}}">
              <h3 class="mb-3">Meja</h3>
              <p class="text-muted mb-0">Booking Meja Restoran, Event Space.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Solusi Sempurna Untuk Penyedia Booking Venue</h2>
            <hr class="my-4">
            <p>Anda bisa menawarkan kepada Ceklokasi Venue mana yang harus kami ajak kerjasama.</p>
            <p>Ceklokasi mempermudah reservasi dan booking serta memberikan penggunaan sistem Ceklokasi khusus untuk pengelolaan venue.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-whatsapp fa-3x mb-3 sr-contact text-success"></i>
            <p>081-355-553-758</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:cs@ceklokasi.id">cs@ceklokasi.id</a>
            </p>
          </div>
        </div>
      </div>
    </section> 

    @include('homepage.footer')
    
    <!-- Bootstrap core JavaScript -->
    @include('homepage.library.footer')
    
    <!-- Custom scripts for this template -->
    <!-- <script src="{{asset('assets/homepage/js/creative.min.js')}}"></script> -->
    <script type="text/javascript">
      var lokasi = {lat: -5.137845496694135, lng: 119.40707525634753};
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: lokasi
        });
        var marker = new google.maps.Marker({
          position: lokasi,
          map: map,
          draggable:true
        });

        google.maps.event.addListener(marker,'dragend',function(){
          $('input[name=area_lat').val(marker.getPosition().lat());
          $('input[name=area_lng').val(marker.getPosition().lng());
        });
   
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoq04fAVg-LNmUp4jisrlUBtCphBA5l6c&callback=initMap">
    </script>
  </body>

</html>
