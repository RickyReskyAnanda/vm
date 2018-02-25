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
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-shrink p-0" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger p-0" href="#page-top">Ceklokasi</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Menjadi Partner</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Bantuan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Daftar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Log Masuk</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="text-white d-flex border-bottom bg-light">
      <div class="container mb-1 mt-5">
        <div class="row" >
          <div class="col-lg-10 mx-auto ">

              <div class="form-group row">
                <div class="col-sm-6">
                  <div class="input-group" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-map-marker"></i></span>
                    </div>
                    <input type="text" name="lokasi" class="form-control" value="{{$request->lokasi}}" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Lokasi anda">
                  </div>
                  <div class="dropdown-menu" id="opsi-lokasi">
                    @foreach($regencyCooperate as $rc)
                    <div class="dropdown-item opsi-lokasi" data-location="{{$rc->id_home_regency}}">{{$rc->name}}</div>
                    @endforeach
                  </div>
                </div>
                <div class="col-sm-4">
                  <input type="text" name="tipe" class="form-control" value="{{$request->tipe}}" aria-label="Large" aria-describedby="inputGroup-sizing-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="Tipe Venue">
                  <div class="dropdown-menu" id="opsi-tipe">
                    @foreach($venueType as $vt)
                    <div class="dropdown-item opsi-tipe" data-type="{{$vt->id_type}}">{{$vt->name}}</div>
                    @endforeach
                  </div>
                </div>
                <div class="col-sm-2">
                  <button class="btn btn-primary btn-block" id="btnCari">Cari</button>
                </div>
              </div>

          </div>
        </div>
      </div>
    </header>

    <section class="pt-3">
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col px-1">
            <nav aria-label="breadcrumb" >
              <ol class="breadcrumb p-0" style="background: #f3f3f3;">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
              </ol>
            </nav>
          </div>
        </div>

        <div class="row">
          <div class="col-md-8 px-1">

            <div class="card mb-3 no-border">
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" style="background: #aaa;" role="listbox">
                  
                  <?php
                      $i=0;
                      if(isset($detail->getSlider))
                        foreach($detail->getSlider as $slide){
                          $i++;
                  ?>
                  <div class="carousel-item <?php if($i==1)echo 'active';?>">
                    <img class="d-block img-fluid mx-auto" src="https://images.pexels.com/photos/247599/pexels-photo-247599.jpeg?h=350&auto=compress&cs=tinysrgb" style="height: 400px;" alt="Second slide">
                  </div>
                  <?php } ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              <div class="card-body border-top border-right border-left">
                <h4 class="card-title fw-7"><?=$detail->venue_name?></h4>
                <p class="card-text"><?=ucwords($detail->venue_type)?> di <?=ucwords(strtolower($detail->getKota->name))?></p>
                <p class="card-text"><?=ucfirst($detail->information)?></p>
              </div>
              <div class="card-footer no-border p-0 text-center">
                <div class="row m-0">
                  <a href="" class="col border p-2 fw-7" ><h5><i class="fa fa-phone"></i> <b>Call</b></h5></a>
                  <a href="" class="col border p-2 fw-7"><h5><i class="fa fa-book"></i> <b>Book</b></h5></a>
                </div>
              </div>
            </div><!-- batas card -->

            <ul class="nav nav-pills mb-2 border bg-light">
              <li class="nav-item">
                <a class="nav-link br-1 py-3 px-4 active" href="#"><b>Overview</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link br-1 py-3 px-4 border-right" href="#">Paket</a>
              </li>
              <li class="nav-item">
                <a class="nav-link br-1 py-3 px-4 border-right" href="#">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link br-1 py-3 px-4 border-right" href="#">Foto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link br-1 py-3 px-4 border-right" href="#">Aturan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link br-1 py-3 px-4 border-right" href="#">Kontak</a>
              </li>
            </ul>
            <!-- menu navbar -->
            <!-- card overview untuk ruangan atau venue-->
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <div class="row mb-4">
                      <div class="col">
                        <h6 class="card-title fw-7">Fasilitas</h6>
                        @foreach($detail->getFacilityShow as $facility)
                          <div><i class="fa fa-check"></i> {{$facility->name}}</div>
                        @endforeach
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <h6 class="card-title fw-7">Kegunaan</h6>
                        <div> Meeting Room</div>
                        <div> Alumni</div>
                        <div> Birtday Party</div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="row mb-2">
                      <div class="col">
                        @foreach($detail->getOperationalHours as $oh)
                          @if($oh->day == date('w'))
                            @if(isset($oh->start))
                            <h6 class="card-title fw-7">Jam Buka</h6>
                            <div>Hari Ini {{$oh->start}}:00 -  {{$oh->end}}:00</div>
                            <div><small><a href="">Lihat lainnya</a></small></div>
                            @endif
                          @endif
                        @endforeach
                      </div>
                    </div>
                    <!-- <div class="row">
                      <div class="col">
                        <h6 class="card-title fw-7">Kapasitas</h6>
                        <div></div>
                      </div>
                    </div> -->
                    <div class="row">
                      <div class="col">
                        <h6 class="card-title fw-7">Alamat</h6>
                        <div>{{ucfirst($detail->address)}}</div>
                      </div>
                    </div>
                  </div>
                  @if(isset($detail->more_info))
                  <div class="col">
                    <div class="row">
                      <div class="col">
                        <h6 class="card-title fw-7 text-info">More Info</h6>
                        <div><?= $detail->more_info?></div>
                      </div>
                    </div>
                  </div>
                  @endif

                </div>
              </div>  
            </div><!-- batas card -->
            @if(count($detail->getPackage)>0)
            <!-- card overview untuk ruangan atau venue-->
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title fw-7">Paket</h5> 
                
                <div class="list-group list-group-flush">
                  <!-- listnya -->
                  <?php $i=0; ?>
                  @foreach($detail->getPackage as $paket)
                  <div class="list-group-item px-0 py-2">
                    <div class="row">
                      <div class="col">
                        <h6 class="card-title fw-7 mb-1 text-danger">{{$paket->name}} [6 Jam]</h6>
                        <div><label class="mb-0">IDR 170.000,- nett/person</label></div>
                        <div><b><a href="javascript:;" class="text-primary float-right btn-detail-package" data-id="{{$i}}">Detail <i class="fa fa-sort-desc"></i> </a></b></div>
                        <div class="p-3 p-detail-package" data-id="{{$i}}">
                          <div><i class="fa fa-check"></i> Suite Room Free</div>
                          <div><i class="fa fa-check"></i> For 2 person</div>
                          <div><i class="fa fa-check"></i> 2x Coffee Break</div>
                          <div><i class="fa fa-check"></i> Lunch/Dinner</div>
                          <div><i class="fa fa-check"></i> Breakfast</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  <!-- batas list -->
                </div>

              </div>  
            </div><!-- batas card -->
            @endif

            <!-- card overview untuk location maps-->
            <div class="card mb-3">
              <div class="card-header bg-white">
                <h5 class="card-title fw-7 mb-0">Lokasi</h5> 
              </div>
              <div class="card-body px-0 py-0">
                  <!-- listnya -->
                  <div id="map" class="px-0 mx-0"></div>


              </div>  
            </div><!-- batas card -->

            <!-- card reviews-->
            <div class="card">
              <div class="card-body">
                
                <h5 class="card-title fw-7">Tanggapan</h5> 
                @if(count($detail->getReview)>0)
                <button class="btn btn-success">Tulis Tanggapan</button>
                @foreach($detail->getReview as $komentar)
                <div class="media mb-4">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                  <div class="media-body">
                    <h5 class="mt-0">{{$komentar->name}}</h5>
                    {{$komentar->comment}}
                  </div>
                </div>
                @endforeach
                @else
                <p class="text-danger">Be first comment in this venue</p>
                <button class="btn btn-success">Tulis Tanggapan</button>
                @endif
              </div>

            </div><!-- batas card -->

          </div>
          <div class="col-md-4">
            <div class="row mb-3">
              <div class="col px-1">
                <div class="card">
                  <div class="card-body">
                    <!-- <div class="row mb-3">
                      <div class="col"> 
                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
                            <b>Rp258,000</b> <small>/perhari</small>
                          </button>
                          <div class="dropdown-menu" style="width: 100%;" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Perhari</a>
                            <a class="dropdown-item" href="#">perjam</a>
                            <a class="dropdown-item" href="#">Perbulan</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="dropdown-divider mb-3"></div>
                    <h6 class="card-subtitle text-primary">Ruangan 50</h6>
                    <h5 class="card-title">Upper Hils Makassar</h5> -->
                    <button class="btn btn-warning btn-lg btn-block">Book</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- venue terdekat -->
            <div class="row">
              <div class="col px-1">
                <div class="card">
                  <div class="card-body">
                    
                    <h5 class="card-title fw-7">Venue terdekat</h5> 

                    <div class="list-group list-group-flush">
                      <!-- listnya -->
                      <div class="list-group-item px-0 py-2">
                        <div class="row">
                          <div class="col-sm-2">
                            <img src="https://b.zmtcdn.com/data/pictures/8/16564478/fa9d9a7a73d58f62223fd6635918e3ae_featured_v2.jpg?fit=around%7C40%3A40&crop=40%3A40%3B%2A%2C%2A  "> 
                          </div>
                          <div class="col-sm-10">
                            <h6 class="m-0"><b>Cras justo odio</b></h6>
                            <small>Meeting Room</small>
                          </div>
                        </div>
                      </div>
                      <div class="list-group-item px-0 py-2">
                        <div class="row">
                          <div class="col-sm-2">
                            <img src="https://b.zmtcdn.com/data/pictures/8/16564478/fa9d9a7a73d58f62223fd6635918e3ae_featured_v2.jpg?fit=around%7C40%3A40&crop=40%3A40%3B%2A%2C%2A  "> 
                          </div>
                          <div class="col-sm-10">
                            <h6 class="m-0"><b>Cras justo odio</b></h6>
                            <small>Mamajang, Kota Makassar</small>
                          </div>
                        </div>
                      </div>
                      <!-- batas list -->
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- batas row -->
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
    @include('homepage.footer')


    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('assets/homepage/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/homepage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('assets/homepage/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/homepage/vendor/scrollreveal/scrollreveal.min.js')}}"></script>
    <script src="{{asset('assets/homepage/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <!-- <script src="js/creative.min.js"></script> -->
    <script type="text/javascript">
      $('.p-detail-package').hide();
      var pDetailPackage = [];
      $('.btn-detail-package').click(function(){
        indexP = $(this).attr('data-id');
        if (typeof pDetailPackage[indexP] === 'undefined' || pDetailPackage[indexP] === null) {
          pDetailPackage[indexP]=0;
        }

        if(pDetailPackage[indexP] == 0){
          $('.p-detail-package[data-id='+$(this).attr('data-id')+']').show();
          pDetailPackage[indexP]=1;
          $(this).html('Close <i class="fa fa-sort-asc"></i>');
        }else if(pDetailPackage[indexP] == 1){
          $('.p-detail-package[data-id='+$(this).attr('data-id')+']').hide();
          pDetailPackage[indexP]=0;
          $(this).html('Detail <i class="fa fa-sort-asc"></i>');
        }
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        /*pencarian*/
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
           $('#modalSearch').modal('show');
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
    <script>
      function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoq04fAVg-LNmUp4jisrlUBtCphBA5l6c&callback=initMap">
    </script>


  </body>

</html>
 <!-- AIzaSyDoq04fAVg-LNmUp4jisrlUBtCphBA5l6c  -->