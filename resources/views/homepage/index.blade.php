<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Reservasi dan Booking venue mudah, cepat secara online">
    <meta name="author" content="ceklokasi.id">

    <title>Reservasi dan Booking venue mudah, cepat secara online | Ceklokasi.id</title>


    @include('homepage.library.header')


  </head>

  <body id="page-top">

    <!-- Navigation -->
    @include('homepage.navbar-home')

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
            <i class="fa fa-whatsapp fa-3x mb-3 sr-contact tex-success"></i>
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
    @include('homepage.library.footer')

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
    <script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: 'c32d5140-98b4-45f7-8dad-177a92c69407', f: true }); done = true; } }; })();</script>

  </body>

</html>
