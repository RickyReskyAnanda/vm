<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Reservasi dan Booking venue mudah, cepat secara online">
    <meta name="author" content="ceklokasi.id">

    <title>Reservasi dan Booking venue mudah, cepat secara online | Ceklokasi.id</title>


    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/homepage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('assets/homepage/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="{{asset('assets/homepage/vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('assets/homepage/css/creative.css')}}" rel="stylesheet">


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
            <i class="fa fa-whatsapp fa-3x mb-3 sr-contact"></i>
            <p>081-355-553-758</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:feedback@ceklokasi.id">cs@ceklokasi.id</a>
            </p>
          </div>
        </div>
      </div>
    </section> 

    @include('homepage.footer')
    
    <!-- <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <label>Silahkan pilih lokasi dan tipe venue terlebih dahulu!</label>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('assets/homepage/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/homepage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('assets/homepage/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/homepage/vendor/scrollreveal/scrollreveal.min.js')}}"></script>
    <script src="{{asset('assets/homepage/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <!-- <script src="{{asset('assets/homepage/js/creative.min.js')}}"></script> -->
  </body>

</html>