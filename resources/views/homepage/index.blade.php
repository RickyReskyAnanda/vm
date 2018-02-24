<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Creative - Start Bootstrap Theme</title>

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
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-shrink" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Ceklokasi</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{url('menjadi-partner')}}">Menjadi Partner</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{url('bantuan')}}">Bantuan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{url('user/daftar')}}">Daftar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{url('user')}}">Log Masuk</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row mb-4 mt-7">
          <div class="col-lg-10 mx-auto">
            <h1>Temukan Tempat Terbaik Anda</h1>
          </div>
        </div>
        <div class="row" >
          <div class="col-lg-10 mx-auto background-search bg-shadow">
            <!-- search -->
            <div class="form-group row">
              <div class="col-sm-6">
                <div class="input-group input-group-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-map-marker"></i></span>
                  </div>
                  <input type="text" name="lokasi" class="form-control form-control-lg" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Lokasi anda">
                </div>
                <div class="dropdown-menu" id="opsi-lokasi">
                  @foreach($regencyCooperate as $rc)
                  <div class="dropdown-item opsi-lokasi" data-location="{{$rc->id_home_regency}}">{{$rc->name}}</div>
                  @endforeach
                </div>
              </div>
              <div class="col-sm-4">
                <input type="text" name="tipe" class="form-control form-control-lg" aria-label="Large" aria-describedby="inputGroup-sizing-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="Tipe Venue">
                <div class="dropdown-menu" id="opsi-tipe">
                  @foreach($venueType as $vt)
                  <div class="dropdown-item opsi-tipe" data-type="{{$vt->id_type}}">{{$vt->name}}</div>
                  @endforeach
                </div>
              </div>
              <div class="col-sm-2">
                <button class="btn btn-primary btn-lg btn-block" id="btnCari">Cari</button>
              </div>
            </div><!-- batas search -->
          </div>
        </div>
      </div>
    </header>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mx-auto">
            <h2 class="section-heading">Aktivitas di Ceklokasi</h2>
            <hr class="light my-4">

          </div>
        </div>
        <div class="row">
          <div class="col-lg-3">
            <div class="card bg-shadow no-border">
              <img class="card-img-top" src="{{asset('images/home/family.jpeg')}}" alt="Card image cap">
              <div class="card-header">
                <strong><h6 class="card-text">Keluarga</h6></strong>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card bg-shadow no-border">
              <img class="card-img-top" src="{{asset('images/home/social.jpeg')}}" alt="Card image cap">
              <div class="card-header">
                <strong><h6 class="card-text">Sosial</h6></strong>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card bg-shadow no-border">
              <img class="card-img-top" src="{{asset('images/home/corporate.jpeg')}}" alt="Card image cap">
              <div class="card-header">
                <strong><h6 class="card-text">Perusahaan</h6></strong>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card bg-shadow no-border">
              <img class="card-img-top" src="{{asset('images/home/bisnis.jpeg')}}" alt="Card image cap">
              <div class="card-header">
                <strong><h6 class="card-text">Bisnis</h6></strong>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mx-auto">
            <h2 class="section-heading">Quick Searches</h2>
          </div>
        </div>
        <p>Temukan venue berdasarkan tipenya  </p>
        <div class="row">
          <div class="col">
            <div class="card bg-shadow no-border">
              <img class="card-img-top" src="{{asset('images/home/type/cafe-and-resto.jpg')}}" alt="Card image cap">
              <div class="card-header">
                <label style="font-size: 14px !important;">Cafe & Resto</label>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card bg-shadow no-border">
              <img class="card-img-top" src="{{asset('images/home/type/cafe.jpg')}}" alt="Card image cap">
              <div class="card-header">
                <label style="font-size: 14px !important;">Cafe</label>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card bg-shadow no-border">
              <img class="card-img-top" src="{{asset('images/home/type/meeting-room.jpg')}}" alt="Card image cap">
              <div class="card-header">
                <label style="font-size: 14px !important;">Meeting Room</label>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card bg-shadow no-border">
              <img class="card-img-top" src="{{asset('images/home/type/conference-room.jpg')}}" alt="Card image cap">
              <div class="card-header">
                <label style="font-size: 14px !important;">Conference Room</label>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card bg-shadow no-border">
              <img class="card-img-top" src="{{asset('images/home/type/ballroom.jpg')}}" alt="Card image cap">
              <div class="card-header">
                <label style="font-size: 14px !important;">Ball Room</label>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="card bg-shadow no-border">
              <img class="card-img-top" src="{{asset('images/home/type/working-space.jpg')}}" alt="Card image cap">
              <div class="card-header">
                <label style="font-size: 14px !important;">Working Space</label>
              </div>
            </div>
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


    <section class="bg-dark text-white">
      <div class="container text-center">
        <h2 class="mb-4">Ayo jadi Partner Ceklokasi !</h2>
        <a class="btn btn-warning btn-xl sr-button" href="{{url('menjadi-partner')}}">Daftar Sekarang!</a>
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
              <a href="mailto:feedback@ceklokasi.id">feedback@ceklokasi.id</a>
            </p>
          </div>
        </div>
      </div>
    </section> 

    @include('homepage.footer')
    
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('assets/homepage/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/homepage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('assets/homepage/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/homepage/vendor/scrollreveal/scrollreveal.min.js')}}"></script>
    <script src="{{asset('assets/homepage/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('assets/homepage/js/creative.min.js')}}"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.opsi-lokasi').click(function(){
          $('input[name=lokasi]').val($(this).text());
        });

        $("input[name=lokasi]").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#opsi-lokasi div").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });

        $('.opsi-tipe').click(function(){
          $('input[name=tipe]').val($(this).text());
        });
        $("input[name=tipe]").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#opsi-tipe div").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });

        $('#btnCari').click(function(){
          if($("input[name=tipe]").val() == '' || $("input[name=lokasi]").val() == ''){
           $('.bd-example-modal-sm').modal('show');
          }else{
            var url = "{{url('search')}}";
            var form = $('<form action="' + url + '" method="get">' +
              '<input type="hidden" name="lokasi" value="'+$("input[name=lokasi]").val()+'" />' +
              '<input type="hidden" name="tipe" value="'+$("input[name=tipe]").val()+'" />' +
              '</form>');
            $('body').append(form);
            form.submit();
          }
        });
      });



    </script>

  </body>

</html>
