<!DOCTYPE html>
<html lang="en">

  <head>

    @include('homepage.library.header')

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

    <section>
      <div class="container">

        <div class="row">
          

          <div class="col-md-9 px-1">
            <div class="row" id="listDataVenue">
              <!-- isi list data pencarian -->
              
            </div>
            <!-- <div class="row">
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
            </div> -->
          </div>

          <div class="col-md-3">
            <div class="card mb-2 br-1">
              <div class="card-body">
                <h6 class="card-title mb-3" style="font-weight: 700">Filter</h6>
                <h6 class="card-title">Filter Lokasi</h6>
                @foreach($kecamatan as  $kec)
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="cbLokasi" class="custom-control-input" value="{{$kec->id_district}}" id="kec{{strtolower($kec->name)}}">
                  <label class="custom-control-label" for="kec{{strtolower($kec->name)}}">{{ucfirst(strtolower($kec->name))}}</label>
                </div>
                @endforeach
                <!-- <br/>
                <h6 class="card-title">Fasilitas</h6>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="Mamajang">
                  <label class="custom-control-label" for="Mamajang">Mamajang</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="Makassar">
                  <label class="custom-control-label" for="Makassar">Makassar</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="Tamalate">
                  <label class="custom-control-label" for="Tamalate">Tamalate</label>
                </div>
                <br/> -->
              </div>
            </div>
          </div>
          
        </div>
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

    <!-- Bootstrap core JavaScript -->
    @include('homepage.library.footer')
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

    //     /*filter-filter*/
        var dataLokasi = "{{$request->lokasi}}";
        var dataTipe = "{{$request->tipe}}";
        var dataVenue= [];
        var selectedKecamatan = "";
        var urutan = 0;
        
        var getDataVenue = function(){
          $.ajax({
            url: "{{url('api/v1/search')}}", 
            method:'post',
            data: {
                    'kecamatan':selectedKecamatan,
                    'lokasi':dataLokasi,
                    'tipe':dataTipe,
                    // 'urutan':urutan,
                  },
            dataType:'json',
            success: function(result){
              console.log(result);
              dataVenue = result;
              setDataVenue();
            }
          });
        }

        getDataVenue();

        
        var setDataVenue = function(){
          $('#listDataVenue').html(' ');    
          $.each(dataVenue.response, function (index, itemData) {

            $('#listDataVenue').append('<div class="col-lg-4 col-md-4 px-1 mb-2">'+
                '<a href="'+itemData.url_venue+'">'+
                '<div class="card">'+
                  '<img class="card-img-top" src="'+itemData.image_profil+'" onerror="imgError(this);" alt="Card image cap">'+
                  '<div class="card-body">'+
                    '<h6 class="card-subtitle text-primary">'+itemData.name+'</h6>'+
                    '<h5 class="card-title">'+itemData.venue_name+'</h5>'+
                  '</div>'+
                '</div>'+
              '</a>'+
              '</div>');    
          });
        }//batas setDataVenue

      //filter kecamatan
      $('input[name=cbLokasi]').change(function() {

        selectedKecamatan = "";
        $('input[name="cbLokasi"]:checked').each(function() {
          if(selectedKecamatan == "")
            selectedKecamatan=this.value;
          else
            selectedKecamatan+=','+this.value;
        });
        // console.log(selectedKecamatan);
        getDataVenue();
      });

    //   //filter untuk urutan 
    //   $(document).on('click','.urutan',function(){
    //     urutan = $(this).attr('data-id');
    //     getDataVenue();
    //   });


    });

      function imgError(image) {
        image.onerror = "";
        image.src = "{{asset('images/error/placeholder_200.jpg')}}";
        return true;
    }
    </script>

  </body>

</html>
