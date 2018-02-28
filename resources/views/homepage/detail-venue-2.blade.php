<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Reservasi dan Booking venue mudah, cepat secara online">
    <meta name="author" content="ceklokasi.id">

    <title>Reservasi dan Booking venue mudah, cepat secara online | Ceklokasi.id</title>

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
    @include('homepage.navbar')

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

    <section class="pt-3 pb-0">
      <div class="container">
        <!-- row -->
        @if(isset($detail->getVenue->getProvinsi->name) && isset($detail->getVenue->getKota->name))
        <div class="row">
          <div class="col px-1">
            <small>
            <nav aria-label="breadcrumb" >
              <ol class="breadcrumb p-0" style="background: #f3f3f3;">
                <li class="breadcrumb-item">{{ucwords(strtolower($detail->getVenue->getProvinsi->name))}}</li>
                <li class="breadcrumb-item">{{ucwords(strtolower($detail->getVenue->getKota->name))}}</li>
                <li class="breadcrumb-item active" aria-current="page">{{$detail->name}}</li>
              </ol>
            </nav>
            </small>
          </div>
        </div>
        @endif

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
                    <img class="d-block img-fluid mx-auto" src="{{$slide->url}}" style="height: 400px;" alt="{{$slide->name}}">
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
                <h5 class="card-subtitle fw-7 mx-0 text-info"><?=$detail->name?></h5>
                <h4 class="card-title fw-7"><?=$detail->getVenue->venue_name?></h4>
                <p class="card-text"><?=ucwords($detail->room_type)?> di <?=ucwords(strtolower($detail->getVenue->getKota->name))?></p>
                <p class="card-text"><?=ucfirst($detail->information)?></p>
              </div>
            </div><!-- batas card -->

            <!-- <ul class="nav nav-pills mb-2 border bg-light">
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
            </ul> -->
            <!-- menu navbar -->
            <!-- card overview untuk ruangan atau venue-->
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                  @if(count($detail->getFacilityShow)>0 && count($detail->venue_usage)>0)
                  <div class="col">
                    @if(count($detail->getFacilityShow)>0)
                    <div class="row mb-4">
                      <div class="col">
                        <h6 class="card-title fw-7">Fasilitas</h6>
                        @foreach($detail->getFacilityShow as $facility)
                          <div><i class="fa fa-check"></i> {{$facility->name}}</div>
                        @endforeach
                      </div>
                    </div>
                    @endif
                    
                    @if(count($detail->venue_usage)>0)
                    <div class="row">
                      <div class="col">
                        <h6 class="card-title fw-7">Kegunaan</h6>
                        @for($i=0;$i<count($detail->venue_usage);$i++)
                        <div> {{$detail->venue_usage[$i]}}</div>
                        @endfor
                      </div>
                    </div>
                    @endif
                  </div>
                  @endif
                  <div class="col">
                    <div class="row mb-2">
                      <div class="col">
                        @foreach($detail->getVenue->getOperationalHours as $oh)
                          @if($oh->day == date('w'))
                            @if(isset($oh->start))
                            <h6 class="card-title fw-7">Jam Buka</h6>
                            <div>Hari Ini {{$oh->start}}:00 -  {{$oh->end}}:00</div>
                            @endif
                          @endif
                        @endforeach
                        <div class="dropdown show">
                          <a class="dropdown-toggle" href="javascript:;" role="button" id="dropdownMenuLinka" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <small>Lihat Lainnya</small>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLinka">
                          <?php 
                            $hari[0]='Minggu';
                            $hari[1]='Senin';
                            $hari[2]='Selasa';
                            $hari[3]='Rabu';
                            $hari[4]='Kamis';
                            $hari[5]='Jumat';
                            $hari[6]='Sabtu';
                          ?>
                          @foreach($detail->getVenue->getOperationalHours as $oh)
                            
                            @if($oh->day == date('w'))
                            <div class="dropdown-item"><b class="text-danger">{{$hari[$oh->day]}} {{$oh->start}}:00 -  {{$oh->end}}:00</b></div>
                            @else
                            <div class="dropdown-item">{{$hari[$oh->day]}} {{$oh->start}}:00 -  {{$oh->end}}:00</div>
                            @endif
                          @endforeach
                          </div>
                        </div>
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
            @if(isset($detail->latitude) && isset($detail->longitude))
            <div class="card mb-3">
              <div class="card-header bg-white">
                <h5 class="card-title fw-7 mb-0">Lokasi</h5> 
              </div>
              <div class="card-body px-0 py-0">
                  <!-- listnya -->
                  <div id="map" class="px-0 mx-0"></div>
              </div>  
            </div><!-- batas card -->
            @endif

            <!-- card reviews-->
            <div class="card">
              <div class="card-body">
                
                <h5 class="card-title fw-7">Tanggapan</h5>
                <form action="{{url('review/venue')}}" class="text-right" id="taTulisTanggapan" method="post">
                  {{csrf_field()}}
                  <input type="hidden" name="id"  value="{{base64_encode(base64_encode(strval($detail->id_room)))}}">
                  <input type="hidden" name="kind" value="room">
                  <textarea class="form-control mb-1" name="review"  placeholder="Review.."></textarea>
                  <button type="submit" class="btn btn-success">Kirim</button>
                </form> 
                @if(count($detail->getReview)>0)
                <button class="btn btn-success" id="btnTulisTanggapan">Tulis Tanggapan</button>
                <hr/>
                @foreach($detail->getReview as $komentar)
                <div class="media mb-4">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                  <div class="media-body">
                    <h5 class="mt-0">{{$komentar->name}}</h5>
                    {{$komentar->komentar}}
                  </div>
                </div>
                @endforeach
                @else
                <p class="text-danger">Be first comment in this venue</p>
                <button class="btn btn-success" id="btnTulisTanggapan">Tulis Tanggapan</button>
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
                    @if(isset($detail->website))
                    <a href="{{$detail->website}}" target="_blank" class="btn btn-warning btn-lg btn-block">Book</a>
                    @else
                    <button class="btn btn-block btn-warning btn-lg" data-toggle="modal" data-target="#modalCall"><i class="fa fa-phone"></i> Call</button>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <!-- venue terdekat -->
            @if(count($detail->venue_terdekat)>0)
            <div class="row">
              <div class="col px-1">
                <div class="card">
                  <div class="card-body">
                    
                    <h5 class="card-title fw-7">Venue terdekat</h5> 

                    <div class="list-group list-group-flush">
                      <!-- listnya -->
                      @foreach($detail->venue_terdekat as $terdekat)
                      <div class="list-group-item px-0 py-2">
                        <a href="{{$terdekat->url_venue}}">
                          <div class="row">
                            <div class="col-sm-2">
                              <img src="https://b.zmtcdn.com/data/pictures/8/16564478/fa9d9a7a73d58f62223fd6635918e3ae_featured_v2.jpg?fit=around%7C40%3A40&crop=40%3A40%3B%2A%2C%2A  "> 
                            </div>
                            <div class="col-sm-10">
                              <h6 class="m-0"><b>{{ucfirst($terdekat->venue_name)}}</b></h6>
                              <small>{{ucfirst($terdekat->venue_type)}}</small>
                            </div>
                          </div>
                        </a>
                      </div>
                      @endforeach
                      
                      <!-- batas list -->
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
        <!-- batas row -->
      </div>  
    </section>

    <section class="mt-1">
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
    <!-- modal call -->
    <div class="modal fade bd-example-modal-sm" id="modalCall" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body text-center" id="modalCallBody">
            <h5 class="fw-7">Nomor Telpon :</h5>
            <h6 class="fw-7 text-danger">{{$detail->official_number}}</h6>
            <h6 class="fw-7 text-danger">{{$detail->contact_number}}</h6>
          </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    @include('homepage.library.footer')

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
          $(this).html('Detail <i class="fa fa-sort-desc"></i>');
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

        $('#taTulisTanggapan').hide();
        $('#btnTulisTanggapan').click(function(){
          <?php if(Auth::check()){?>
              $('#taTulisTanggapan').show();
              $('#btnTulisTanggapan').hide();
          <?php }else{ ?>
              $('#loginUser').modal('show');
          <?php } ?>
        });
      });
    

      <?php if(isset($detail->getVenue->latitude) && isset($detail->getVenue->longitude)){?>
      function initMap() {
        var uluru = {lat: {{$detail->getVenue->latitude}}, lng: {{$detail->getVenue->longitude}}};
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
    <?php } ?>
    </script>


  </body>

</html>
