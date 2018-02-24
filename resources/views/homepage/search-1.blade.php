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

    <section>
      <div class="container">

        <div class="row">
          <div class="col-lg-3">
            <div class="card mb-2 br-1">
              <div class="card-body">
                <h6 class="card-title mb-3" style="font-weight: 700">Filter</h6>
                <h6 class="card-title">Filter Lokasi</h6>
                @foreach($kecamatan as  $kec)
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="cbLokasi[]" class="custom-control-input" id="kec{{strtolower($kec->name)}}">
                  <label class="custom-control-label" for="kec{{strtolower($kec->name)}}">{{ucfirst(strtolower($kec->name))}}</label>
                </div>
                @endforeach
                
                <br/>
              </div>
            </div>
          </div>

          <div class="col-lg-6 px-1">
            <div class="row" id="listDataVenue">
              <!-- isi list data pencarian -->
            </div>
            <div class="row">
              <div class="col-lg-12 mb-4 px-1">
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="card mb-2 br-1">
              <div class="card-body p-3" style="background:#E5EAED;">
                <h6 class="card-title mb-3" style="font-weight: 700">Urutkan Berdasarkan</h6>
                <a href="" class="saran-list">Saran</a>
                <a href="" class="saran-list">Saran</a>
                <a href="" class="saran-list">Saran</a>
                <a href="" class="saran-list">Saran</a>
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
          <div class="col-lg-2">
            <div class="card bg-shadow no-border">
              <img class="card-img-top" src="https://www.quackit.com/pix/samples/12s.jpg" alt="Card image cap">
              <div class="card-header">
                <strong><h6 class="card-text">Keluarga</h6></strong>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="card bg-shadow no-border">
              <img class="card-img-top" src="https://www.quackit.com/pix/samples/12s.jpg" alt="Card image cap">
              <div class="card-header">
                <strong><h6 class="card-text">Sosial</h6></strong>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="card bg-shadow no-border">
              <img class="card-img-top" src="https://www.quackit.com/pix/samples/12s.jpg" alt="Card image cap">
              <div class="card-header">
                <strong><h6 class="card-text">Perusahaan</h6></strong>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="card bg-shadow no-border">
              <img class="card-img-top" src="https://www.quackit.com/pix/samples/12s.jpg" alt="Card image cap">
              <div class="card-header">
                <strong><h6 class="card-text">Bisnis</h6></strong>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="card bg-shadow no-border">
              <img class="card-img-top" src="https://www.quackit.com/pix/samples/12s.jpg" alt="Card image cap">
              <div class="card-header">
                <strong><h6 class="card-text">Perusahaan</h6></strong>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="card bg-shadow no-border">
              <img class="card-img-top" src="https://www.quackit.com/pix/samples/12s.jpg" alt="Card image cap">
              <div class="card-header">
                <strong><h6 class="card-text">Bisnis</h6></strong>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @include('homepage.footer')
    <div class="modal fade bd-example-modal-sm" id="modalSearch" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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

    <!-- modal call -->
    <div class="modal fade bd-example-modal-sm" id="modalCall" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><b id="modalCallHeader">Upperhills</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center" id="modalCallBody">
            <h5 class="fw-7">Nomor Telpon :</h5>
            <h6 class="fw-7 text-danger">021-2324-234</h6>
            <h6 class="fw-7 text-danger">081-232-42-34233</h6>
          </div>
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
    <!-- <script src="js/creative.min.js"></script> -->
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
        //---- batas pencarian------

        /*filter-filter*/
        var dataLokasi = "{{$request->lokasi}}";
        var dataTipe = "{{$request->tipe}}";
        var dataVenue= [];
        
        var getDataVenue = function(){
          $.ajax({
            url: "{{url('api/v1/search')}}?lokasi="+dataLokasi+"&tipe="+dataTipe, 
            success: function(result){
              dataVenue = result;
              setDataVenue();
            }
          });
        }

        getDataVenue();

        $(document).on('click','.card-btn-call',function(){
          itemData = dataVenue.response;
          var itemIndex = $(this).attr('data-id');
          
          $('#modalCallHeader').text(itemData[itemIndex].name);
          $('#modalCallBody').html('<h5 class="fw-7">Nomor Telpon :</h5>'+
                                '<h6 class="fw-7 text-danger">'+itemData[itemIndex].official_number+'</h6>'+
                                '<h6 class="fw-7 text-danger">'+itemData[itemIndex].contact_number+'</h6>');
          $('#modalCall').modal('show');
        });
        var setDataVenue = function(){
          $('#listDataVenue').html(' ');    
          $.each(dataVenue.response, function (index, itemData) {

            $('#listDataVenue').append('<div class="col-lg-12 mb-2 px-1">'+
                '<div class="card no-border">'+
                  '<div class="card-body p-2 border-top border-right border-left">'+
                    '<div class="row">'+
                      '<div class="col-md-4">'+
                        '<img class="br-1 " style="width: 100%" src="https://www.quackit.com/pix/samples/12s.jpg" alt="Card image cap">'+
                      '</div>'+
                      '<div class="col-md-8">'+
                        '<h6 class="card-subtitle m-0 fw-7">'+itemData.type+'</h6>'+
                        '<h5 class="card-title text-primary fw-7"><a href="">'+itemData.name+'</a></h5>'+
                        '<small class="card-text"><i class="fa fa-map-marker"></i> '+itemData.lokasi+'</small><br/>'+
                        '<small class="card-text text-info">'+itemData.address.substr(0, 55)+'...</small>'+
                      '</div>'+
                    '</div>'+
                    '<div class="dropdown-divider"></div>'+
                    '<div class="row">'+
                      '<div class="col">'+
                        '<div><span class="col-sm-5 col-md-4">Jam Buka:</span><span class="col-sm-7 col-md-8">07.00 - 22.00</span></div>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                  '<div class="card-footer no-border p-0 text-center">'+
                    '<div class="row m-0">'+
                      '<div class="col border p-2 card-btn-call" data-id="'+index+'" ><i class="fa fa-phone"></i> Call</div>'+
                      '<div class="col border p-2 card-btn-menu" data-id="'+index+'"><i class="fa fa-book"></i> View Menu</div>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
              '</div>');    
          });
        }//batas setDataVenue

        

      });
    </script>

  </body>

</html>
