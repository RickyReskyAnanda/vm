@extends('administrator.index')

@section('content')
  <link rel="stylesheet" href="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{$detail->venue_name}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('sandwich/venue')}}">Venue</a></li>
        <li class="active">{{$detail->venue_name}}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center">{{$detail->venue_name}}</h3>

              <p class="text-muted text-center">{{$detail->venue_type}}</p>
              @if(isset($detail->getProvinsi->name))
              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
              <p class="text-muted">{{$detail->getKecamatan->name}}, {{$detail->getKota->name}}, {{$detail->getProvinsi->name}}</p>
              @endif
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>View</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Review</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Order</b> <a class="pull-right">13,287</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#pemesanan" data-toggle="tab">Pemesanan</a></li>
              <li><a href="#paket" data-toggle="tab">Paket</a></li>
              @if($detail->is_room =='1')
              <li><a href="#ruangan" data-toggle="tab">Ruangan</a></li>
              @endif
              @if($detail->is_area =='1')
              <li><a href="#area" data-toggle="tab">Area</a></li>
              @endif
              @if($detail->is_table =='1')
              <li><a href="#meja" data-toggle="tab">Meja</a></li>
              @endif
              <li><a href="#jo" data-toggle="tab">Jam Operasional</a></li>
              <li><a href="#galeri" data-toggle="tab">Galeri</a></li>
              <li><a href="#fasilitas" data-toggle="tab">Fasilitas</a></li>
              <li><a href="#setting" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="pemesanan">
                <h2 class="text-center"> Under construction!</h2>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="paket">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahPaket"><i class="fa fa-plus" ></i> Tambah Paket</button>
                <table id="tabel1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="5%">Aksi</th>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Waktu</th>
                    <th>Durasi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($paket as $pakets)
                    <tr>
                      <td><div class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusPaket" onclick="setHapusPaket('{{base64_encode(base64_encode(strval($pakets->id_package)))}}')"><i class="fa fa-trash"></i></div></td>
                      <td>{{$pakets->name}}</td>
                      <td>{{number_format($pakets->price).',-'.$pakets->price_satuan}}</td>
                      <td>{{$pakets->durasi_waktu.' '.$pakets->durasi_satuan}}</td>
                      <td>{{$pakets->start}} - {{$pakets->end}}</td>
                      <td><?=$pakets->informasi;?></td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="jo">
                <div class="table-responsive">
                  <form action="{{url('sandwich/venue/operational/edit')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="id_venue" value="{{base64_encode(base64_encode($detail->id_venue))}}">
                    <button class="btn btn-success btn-sm" type="submit"  style="margin-bottom: 10px;"><i class="fa fa-save"></i> Simpan Pengaturan</button>
                    <table class="table project-table">
                      <thead>
                        <tr>
                          <th>Hari</th>
                          <th>Buka</th>
                          <th>Tutup</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($detail->getOperationalHours as $operational)
                        <tr>
                          <td>{{$hari[$operational->day]}}</td>
                          <td>
                            <select class="form-control" name="buka{{$operational->day}}" required>
                              @for($i=0;$i<24;$i++)
                              <option value="{{$i}}" <?php if($operational->start == $i)echo "selected='selected'";?>><?php if(strlen($i)<2)echo "0";echo $i.":00";?></option>
                              @endfor
                            </select>
                          </td>
                          <td>
                            <select class="form-control" name="tutup{{$operational->day}}" required>
                              @for($i=0;$i<24;$i++)
                              <option value="{{$i}}" <?php if($operational->end == $i)echo "selected='selected'";?>><?php if(strlen($i)<2)echo "0";echo $i.":00";?></option>
                              @endfor
                            </select>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </form>
                </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="galeri">
                <div class="table-responsive">
                  <form action="{{url('sandwich/venue/gallery/select-profil')}}" method="post">
                  <a href="javascript:;" class="btn btn-primary btn-sm"  style="margin-bottom: 10px;" data-toggle="modal" data-target="#tambahGaleri"><i class="fa fa-plus"></i> Tambah Gambar</a>
                    <button class="btn btn-success btn-sm" type="submit"  style="margin-bottom: 10px;"><i class="fa fa-save"></i> Simpan Pengaturan</button>
                    {{csrf_field()}}
                    <input type="hidden" name="id_venue" value="{{base64_encode(base64_encode($detail->id_venue))}}">
                    <table class="table project-table">
                      <thead>
                        <tr>
                          <th>Aksi</th>
                          <th>Gambar</th>
                          <th>Nama</th>
                          <th>Gambar Profil</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($detail->getGallery as $galeri)
                        <tr>
                          <td><a href="javascript:;" onclick="setHapusGaleri('{{base64_encode(base64_encode($galeri->id_venue_gallery))}}')" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#hapusGaleri"><i class="fa fa-trash"></i></a></td>
                          <td><img src="{{asset($galeri->url)}}" style="width: 300px;"></td>
                          <td>{{$galeri->name}}</td>
                          <td>
                            @if($galeri->sts == '1')
                            <input type="radio" name="profil" value="{{base64_encode(base64_encode($galeri->id_venue_gallery))}}" <?php if($galeri->profil =='1')echo "checked";?>>
                            @endif
                          </td>
                          <td>
                            @if($galeri->sts == '1')
                            <a href="{{asset('sandwich/venue/gallery/show-hide.'.base64_encode(base64_encode($galeri->id_venue_gallery)))}}" class="btn btn-sm btn-success">Ditampilkan</a>
                            @else
                            <a href="{{asset('sandwich/venue/gallery/show-hide.'.base64_encode(base64_encode($galeri->id_venue_gallery)))}}" class="btn btn-sm btn-danger">Disembuyikan</a>
                            @endif

                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </form>
                </div>
              </div>
              <!-- /.tab-pane -->
              @if($detail->is_room =='1')
              <div class="tab-pane" id="ruangan">
                <div class="table-responsive">
                  <button class="btn btn-primary btn-sm"  style="margin-bottom: 10px;" data-toggle="modal" data-target="#tambahRuangan"><i class="fa fa-plus"></i> Tambah Ruangan</button>
                  <table class="table project-table">
                    <thead>
                      <tr>
                        <th>Nama Ruangan</th>
                        <th>Kapasitas</th>
                        <th>Leader</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($detail->getRoom as $room)
                      <tr>
                        <td><a href="{{url('sandwich/venue/ruangan/detail.'.base64_encode(base64_encode($room->id_room)))}}"><b>{{$room->name}}</b></a></td>
                        <td>
                          <span class="label label-danger">{{$room->capacity}} Orang</span>
                        </td>
                        <td>Meeting Room</td>
                        <td>
                          @if($room->is_published == '1')
                          <span class="label label-success">Ditampil</span>
                          @else
                          <span class="label label-danger">Disembunyikan</span>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.tab-pane -->
              @endif

              @if($detail->is_area == '1')
              <div class="tab-pane" id="area">
                <div class="table-responsive">
                 <!--  <button class="btn btn-primary btn-sm"  style="margin-bottom: 10px;" data-toggle="modal" data-target="#tambahRuangan"><i class="fa fa-plus"></i> Tambah Ruangan</button>
                  <table class="table project-table">
                    <thead>
                      <tr>
                        <th>Nama Ruangan</th>
                        <th>Kapasitas</th>
                        <th>Leader</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table> -->
                  <h2 class="text-center">Under construction</h2>
                </div>
              </div>
              @endif
              <!-- /.tab-pane -->
              @if($detail->is_table == '1')
              <div class="tab-pane" id="meja">
                <div class="table-responsive">
                  <button class="btn btn-primary btn-sm"  style="margin-bottom: 10px;" data-toggle="modal" data-target="#tambahRuangan"><i class="fa fa-plus"></i> Tambah Ruangan</button>
                  <table class="table project-table">
                    <thead>
                      <tr>
                        <th>Nama Ruangan</th>
                        <th>Kapasitas</th>
                        <th>Leader</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.tab-pane -->
              @endif

              <div class="tab-pane" id="fasilitas">
                <div class="table-responsive">
                    <a href="javascript:;" class="btn btn-primary btn-sm"  style="margin-bottom: 10px;" data-toggle="modal" data-target="#tambahFasilitas"><i class="fa fa-plus"></i> Tambah Fasilitas</a>
                    <table class="table project-table">
                      <thead>
                        <tr>
                          <th>Aksi</th>
                          <th>Nama</th>
                          <th>Perhari</th>
                          <th>Perjam</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($detail->getFacility as $fasilitas)
                        <tr>
                          <td>
                            <a href="javascript:;" onclick="setHapusFasilitas('{{base64_encode(base64_encode($fasilitas->id_venue_facility))}}')" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#hapusFasilitas"><i class="fa fa-trash"></i></a>
                          </td>
                          <td>{{$fasilitas->name}}</td>
                          <td>IDR {{number_format($fasilitas->price_perday)}}</td>
                          <td>IDR {{number_format($fasilitas->price_perhour)}}</td>
                          <td>
                            @if($fasilitas->sts == '1')
                            <a href="{{asset('sandwich/venue/fasilitas/show-hide.'.base64_encode(base64_encode($fasilitas->id_venue_facility)))}}" class="btn btn-sm btn-success">Ditampilkan</a>
                            @else
                            <a href="{{asset('sandwich/venue/fasilitas/show-hide.'.base64_encode(base64_encode($fasilitas->id_venue_facility)))}}" class="btn btn-sm btn-danger">Disembuyikan</a>
                            @endif

                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="setting">
                <form action="{{url('sandwich/venue/pengaturan')}}" method="post">
                  {{csrf_field()}}
                  <input type="hidden" name="id_venue" value="{{base64_encode(base64_encode($detail->id_venue))}}">
                  <div class="modal-body">
                  <div class="form-group row">
                    <button class="btn btn-success btn-sm" type="submit" style="margin-bottom: 10px;"><i class="fa fa-save"></i> Simpan Pengaturan</button>
                  </div>
                  <h4>Venue</h4>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label text-right">Nama venue</label>
                    <div class="col-sm-10">
                        <input type="text" name="venue_name" class="form-control" placeholder="Nama Venue" value="{{$detail->venue_name}}" required="required">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label text-right">Tipe venue</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="venue_type" required="required">
                          <option value="" disabled selected> --- </option>
                          @foreach($venueType as $tipeVenue)
                          <option value="{{$tipeVenue->name}}" <?php if($tipeVenue->name == $detail->venue_type)echo "selected='selected'"?>> {{$tipeVenue->name}} </option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label text-right">Jenis penyewaan venue</label>
                    <div class="col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="is_venue" <?php if($detail->is_venue == '1')echo "checked";?>>
                          Venue
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="is_room" <?php if($detail->is_room == '1')echo "checked";?>>
                          Ruangan
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="is_meja" <?php if($detail->is_meja == '1')echo "checked";?>>
                          Meja
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="is_area" <?php if($detail->is_area == '1')echo "checked";?>>
                          Area
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label text-right">Kerja sama venue</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="cooperate" required>
                          <option value="0" <?php if($detail->cooperate == '0')echo "selected";?>>Belum bekerja sama</option>
                          <option value="1" <?php if($detail->cooperate == '1')echo "selected";?>>Telah bekerja sama</option>
                        </select>
                    </div>
                  </div>

                  <h4>Kontak</h4>        
                  <div class="form-group row">
                    <label class="col-sm-2 control-label text-right">Nama Kontak</label>
                    <div class="col-sm-10">
                        <input type="text" name="contact_name" class="form-control" value="{{$detail->contact_name}}" placeholder="Nama Kontak">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label text-right">No.HP Kontak</label>
                    <div class="col-sm-10">
                        <input type="text" name="contact_number" class="form-control" value="{{$detail->contact_number}}" placeholder="No.Handphone Kontak">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label text-right">Email Kontak</label>
                    <div class="col-sm-10">
                        <input type="email" name="contact_email" class="form-control" value="{{$detail->contact_email}}" placeholder="Email Kontak">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label text-right">Nomor Telpon Kantor</label>
                    <div class="col-sm-10">
                        <input type="text" name="official_number" class="form-control" value="{{$detail->official_number}}" placeholder="Nomor Telpon Kantor">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label text-right">Email Kantor</label>
                    <div class="col-sm-10">
                        <input type="email" name="official_email" class="form-control" value="{{$detail->official_email}}" placeholder="Email Kantor">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label text-right">Website</label>
                    <div class="col-sm-10">
                        <input type="text" name="website" class="form-control" value="{{$detail->website}}" placeholder="Website">
                    </div>
                  </div>
                  
                  <h4>Lokasi</h4>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label text-right">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" value="{{$detail->address}}"  placeholder="Nama Venue" required="required">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label text-right">Provinsi</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="province" required="required">
                          <option value="" disabled="disabled" selected="selected"> --- </option>
                          @foreach($areaProvince as $provinsi)
                          <option value="{{$provinsi->id}}" <?php if($provinsi->id == $detail->province)echo "selected='selected'";?>>{{ucwords(strtolower($provinsi->name))}}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label text-right">Kabupaten/Kota</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="city" required="required">
                          <option value="" disabled="disabled" selected="selected"> --- </option>
                          @foreach($areaCity as $kota)
                          <option value="{{$kota->id}}" <?php if($kota->id == $detail->city)echo "selected='selected'";?>>{{ucwords(strtolower($kota->name))}}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label text-right">Kecamatan</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="district" required="required">
                          <option value="" disabled="disabled" selected="selected"> --- </option>
                          @foreach($areaDistrict as $kecamatan)
                          <option value="{{$kecamatan->id}}" <?php if($kecamatan->id == $detail->district)echo "selected='selected'";?>>{{ucwords(strtolower($kecamatan->name))}}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label text-right">Koordinat</label>
                    <div class="col-sm-5">
                        <input type="text" name="lat" value="{{$detail->latitude}}" class="form-control" placeholder="Latitude">
                    </div>
                    <div class="col-sm-5">
                        <input type="text" name="lon" value="{{$detail->Longitude}}" class="form-control" placeholder="Longitude">
                    </div>
                  </div>
                </form>                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>

<!-- Modal -->
<div class="modal fade" id="tambahPaket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Paket Baru</h4>
        </div>
        <form method="post" action="{{url('sandwich/venue/paket/tambah')}}">
          {{csrf_field()}}
          <input type="hidden" name="id_venue" value="{{base64_encode(base64_encode(strval($detail->id_venue)))}}">
          <div class="modal-body">
            <div class="form-group">
              <label>Paket</label>
              <select class="form-control" name="paket">
                <option value="0"> Paket Utama </option>
                @foreach($paket as $pakets)
                <option value="{{$pakets->id_package}}">{{$pakets->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Nama Paket</label>
              <input class="form-control" name="nama" placeholder="Masukkan Nama Venue.." type="text" required>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-6">
                  <label>Start:</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" class="form-control pull-right" name="date_start" required>
                  </div>
                  <!-- /.input group -->
                </div>
                <div class="col-sm-6">
                  <label>End:</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" class="form-control pull-right" name="date_end" required>
                  </div>
                  <!-- /.input group -->
                </div>
              </div>

            </div>
            <div class="form-group">
              <label>Durasi</label>
              <div class="row">
                <div class="col-sm-4">
                  <input class="form-control" name="durasi_waktu" type="number" placeholder="Masukkan Nomor telpon kantor.." type="text" required>
                </div>
                <div class="col-sm-4">
                  <select class="form-control" name="durasi_satuan" required>
                    <option value="" disabled="" selected=""> --- </option>
                    <option value="jam"> -/Jam </option>
                    <option value="hari"> -/Hari </option>
                    <option value="minggu"> -/Minggu </option>
                    <option value="bulan"> -/Bulan </option>
                    <option value="tahun"> -/Tahun </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <div class="row">
                <div class="col-sm-6">
                  <input class="form-control" name="harga" type="number" placeholder="Masukkan Nomor telpon kantor.." type="text" required>
                </div>
                <div class="col-sm-3">
                  <input class="form-control" name="harga_satuan" type="text" placeholder="Satuan Harga" type="text" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Down Payment</label>
              <input class="form-control" name="dp" placeholder="Masukkan Nama Venue.." type="number">
              <span>*Isi jika menggunakan pembayaran dp</span>
            </div>

            <div class="form-group">
              <label>Deskripsi</label>
               <textarea class="textarea" placeholder="Place some text here" name="deskripsi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambahkan</button>
          </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="hapusPaket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Paket</h4>
          </div>
          <div class="modal-body" style="text-align: ">
            <h4>Ingin menghapus paket ?</h4>
            <p>Data tidak dapat dikembalikan !</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="" class="btn btn-danger" id="tombolHapusPaket">Hapus</a>
          </div>
      </div>
    </div>
</div>

<script type="text/javascript">
    function setHapusPaket(id){
        $('#tombolHapusPaket').attr("href", "{{url('sandwich/venue/paket/hapus.')}}"+id);
    }
</script>

<!-- Modal -->
<div class="modal fade" id="tambahRuangan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Ruangan</h4>
          </div>
          <form method="post" action="{{url('sandwich/venue/ruangan/tambah')}}">
            {{csrf_field()}}
            <input type="hidden" name="id_venue" value="{{base64_encode(base64_encode(strval($detail->id_venue)))}}">
            <div class="modal-body">
              <div class="form-group">
                <label>Tipe Ruangan</label>
                <select class="form-control" name="tipe" required>
                  <option value="" disabled selected> --- </option>
                  @foreach($tipeRuangan as $tipe)
                  <option value="{{$tipe->type_name}}">{{ucfirst($tipe->type_name)}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Nama Ruangan</label>
                <input class="form-control" name="nama" placeholder="Masukkan Nama Venue.." type="text" required>
              </div>
              <div class="form-group">
                <label>Kode Ruangan</label>
                <input class="form-control" name="kode" placeholder="Masukkan Nomor telpon kantor.." type="text" required>
              </div>
              <div class="form-group">
                <label>Kapasitas Ruangan</label>
                <input class="form-control" name="kapasitas" placeholder="Masukkan Kontak yang dapat dihubungi.." type="number" required>
              </div>
              <div class="form-group">
                <label>Deskripsi Ruangan</label>
                <textarea class="form-control" name="deskripsi"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
          </form>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahGaleri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Input Foto</h4>
          </div>
          <form method="post" action="{{url('sandwich/venue/gallery/tambah')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id_venue" value="{{base64_encode(base64_encode(strval($detail->id_venue)))}}">
            <div class="modal-body">
              <div class="form-group">
                <label>Gambar</label>
                <input class="form-control" name="gambar" type="file" accept=".jpg,.png" required>
              </div>
              <div class="form-group">
                <label>Nama Gambar</label>
                <input class="form-control" name="nama" placeholder="Masukkan Nama Gambar.." type="text" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
          </form>
      </div>
    </div>
</div>
<div class="modal fade" id="hapusGaleri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Foto</h4>
          </div>
          <div class="modal-body" style="text-align: ">
            <h4>Ingin menghapus foto ?</h4>
            <p>Data tidak dapat dikembalikan !</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="" class="btn btn-danger" id="tombolHapusGaleri">Hapus</a>
          </div>
      </div>
    </div>
</div>

<script type="text/javascript">
    function setHapusGaleri($id){
        $('#tombolHapusGaleri').attr("href", "{{url('sandwich/venue/gallery/hapus.')}}"+$id);
    }
</script>

<!-- Modal -->
<div class="modal fade" id="tambahFasilitas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Fasilitas</h4>
          </div>
          <form method="post" action="{{url('sandwich/venue/fasilitas/tambah')}}" >
            {{csrf_field()}}
            <input type="hidden" name="id_venue" value="{{base64_encode(base64_encode($detail->id_venue))}}">
            <div class="modal-body">
              <div class="form-group">
                <label>Nama</label>
                <input class="form-control" name="nama" type="text" required>
              </div>
              <div class="form-group">
                <label>Harga Perhari</label>
                <div class="input-group">
              <span class="input-group-addon">IDR</span>
              <input class="form-control" type="number" value="0" name="perhari" min="0" placeholder="Isikan Harga" required>
              <span class="input-group-addon">.00</span>
            </div>
            <small>*isikan angka 0 jika gratis</small>
              </div>
              <div class="form-group">
                <label>Harga Perjam</label>
                <div class="input-group">
              <span class="input-group-addon">IDR</span>
              <input class="form-control" type="number" value="0" name="perjam"  min="0" placeholder="Isikan Harga" required>
              <span class="input-group-addon">.00</span>
            </div>
            <small>*isikan angka 0 jika gratis</small>
              </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
          </form>
      </div>
    </div>
</div>
<div class="modal fade" id="hapusFasilitas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Fasilitas</h4>
          </div>
          <div class="modal-body" style="text-align:center; ">
            <h4>Ingin menghapus fasilitas ?</h4>
            <p>Data tidak dapat dikembalikan !</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="" class="btn btn-danger" id="tombolHapusFasilitas">Hapus</a>
          </div>
      </div>
    </div>
</div>

<script type="text/javascript">
    function setHapusFasilitas($id){
        $('#tombolHapusFasilitas').attr("href", "{{url('sandwich/venue/fasilitas/hapus.')}}"+$id);
    }
</script>

<script type="text/javascript">
  $("select[name=province]").change(function() {
      $.get("{{url('api/v1/area/getcitybyprovince')}}/"+$(this).val(), function(data, status){
          $("select[name=city]").html('<option value="" disabled="disabled" selected="selected"> --- </option>');
          $.each(data, function(index, hasil) {
            $("select[name=city]").append('<option value="'+hasil.id+'">'+hasil.name+'</option>');
      });
      });
  });
  $("select[name=city]").change(function() {
      $.get("{{url('api/v1/area/getdistrictbycity')}}/"+$(this).val(), function(data, status){
          $("select[name=district]").html('<option value="" disabled="disabled" selected="selected"> --- </option>');
          $.each(data, function(index, hasil) {
            $("select[name=district]").append('<option value="'+hasil.id+'">'+hasil.name+'</option>');
      });
      });
  });

</script>

<script type="text/javascript">
      var lokasi = {lat: -5.137845496694135, lng: 119.40707525634753};
      function initMap() {
        var map = new google.maps.Map(document.getElementById('mapinput'), {
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
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    // CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
@endsection