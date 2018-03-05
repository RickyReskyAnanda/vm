@extends('administrator.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{$ruangan->name.', '.$venue->venue_name}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('sandwich/venue')}}">Venue</a></li>
        <li><a href="{{url('sandwich/venue/detail.'.base64_encode(base64_encode(strval($venue->id_venue))))}}">{{$venue->venue_name}}</a></li>
        <li class="active">{{$ruangan->name}}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		@if (session('pesan'))
	        <div class="alert alert-success alert-dismissable">
	            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	            {{session('pesan')}}
	        </div>
	    @endif
	    @if (session('gagal'))
	        <div class="alert alert-danger alert-dismissable">
	            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	            {{session('gagal')}}
	        </div>
	    @endif

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
	        <div class="box box-primary">
	            <div class="box-body box-profile">
		            <h3 class="profile-username text-center">{{$ruangan->name}}</h3>

		            <p class="text-muted text-center">{{$ruangan->room_type}}</p>
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
            </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
		<div class="col-md-8">
          	<div class="box">
				<div class="box-body">
					<!-- TABBED CONTENT -->
					<div class="nav-tabs-custom">
			            <ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" role="tab" data-toggle="tab">Harga</a></li>
							<li><a href="#tab3" role="tab" data-toggle="tab">Galeri</a></li>
							<li><a href="#tab4" role="tab" data-toggle="tab">Fasilitas Ruangan</a></li>
							<li><a href="#tab5" role="tab" data-toggle="tab">Penggunaan Ruangan</a></li>
							<li><a href="#tab6" role="tab" data-toggle="tab">Detail Ruangan</a></li>
						</ul>
					</div>
					<!-- RUANGAN -->
					<div class="tab-content">
						<div class="tab-pane fade in active" id="tab1">
							<div class="table-responsive">
								<button class="btn btn-primary btn-sm"  style="margin-bottom: 10px;" data-toggle="modal" data-target="#tambahPaket"><i class="fa fa-plus"></i> Tambah Paket</button>
								<table class="table project-table" id="dataTable">
									<thead>
										<tr>
											<th>Aksi</th>
											<th>Harga</th>
											<th>Nama Paket</th>
											<th>Detail</th>
											<th>Aturan Pembayaran</th>
											<th>Charge</th>
											<th>DP</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										@foreach($ruangan->getPackage as $paket)
										<tr>
											<td><a href="javascript:;" class="btn btn-danger" data-toggle="modal" data-target="#hapusPaket" onclick="setHapusPaket('{{base64_encode(base64_encode($paket->id_room_package))}}')"><i class="fa fa-trash"></i></a></td>
											<td>IDR {{number_format($paket->price)}}</td>
											<td><h4>{{$paket->name}}</h4><label>{{$paket->start}} sampai {{$paket->end}}</label></td>
											<td><p><?=$paket->information?></p></td>
											<td>
												<p><?=$paket->payment_rule?></p>
											</td>
											<td>
												<p><?=$paket->charge?></p>
											</td>
											<td>
												<p>IDR <?=number_format($paket->down_payment)?></p>
											</td>
											<td> 
												@if($paket->sts == '1')
												<a href="{{url('sandwich/venue/ruangan/paket/show-hide.'.base64_encode(base64_encode($paket->id_room_package)))}}" class="btn btn-success">Ditampilkan</a> 
												@else
												<a href="{{url('sandwich/venue/ruangan/paket/show-hide.'.base64_encode(base64_encode($paket->id_room_package)))}}" class="btn btn-danger">Disembunyikan</a> 
												@endif
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="tab3">
							<div class="table-responsive">
								<form action="{{url('sandwich/venue/ruangan/gallery/select-profil')}}" method="post">
								<a href="javascript:;" class="btn btn-primary btn-sm"  style="margin-bottom: 10px;" data-toggle="modal" data-target="#tambahGaleri"><i class="fa fa-plus"></i> Tambah Gambar</a>
									<button class="btn btn-success btn-sm" type="submit"  style="margin-bottom: 10px;"><i class="fa fa-save"></i> Simpan Pengaturan</button>
									{{csrf_field()}}
									<input type="hidden" name="id_ruangan" value="{{base64_encode(base64_encode($ruangan->id_room))}}">
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
											@foreach($ruangan->getGallery as $galeri)
											<tr>
												<td><a href="javascript:;" onclick="setHapusGaleri('{{base64_encode(base64_encode($galeri->id_room_gallery))}}')" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#hapusGaleri"><i class="fa fa-trash"></i></a></td>
												<td><img src="{{asset($galeri->url)}}" style="width: 300px;"></td>
												<td>{{$galeri->name}}</td>
												<td>
													@if($galeri->sts == '1')
													<input type="radio" name="profil" value="{{base64_encode(base64_encode($galeri->id_room_gallery))}}" <?php if($galeri->profil =='1')echo "checked";?>>
													@endif
												</td>
												<td>
													@if($galeri->sts == '1')
													<a href="{{asset('sandwich/venue/ruangan/gallery/show-hide.'.base64_encode(base64_encode($galeri->id_room_gallery)))}}" class="btn btn-sm btn-success">Ditampilkan</a>
													@else
													<a href="{{asset('sandwich/venue/ruangan/gallery/show-hide.'.base64_encode(base64_encode($galeri->id_room_gallery)))}}" class="btn btn-sm btn-danger">Disembuyikan</a>
													@endif

												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</form>
							</div>
						</div>
						<div class="tab-pane fade" id="tab4">
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
										@foreach($ruangan->getFacility as $fasilitas)
										<tr>
											<td>
												<a href="javascript:;" onclick="setHapusFasilitas('{{base64_encode(base64_encode($fasilitas->id_room_facility))}}')" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#hapusFasilitas"><i class="fa fa-trash"></i></a>
											</td>
											<td>{{$fasilitas->name}}</td>
											<td>IDR {{number_format($fasilitas->price_perday)}}</td>
											<td>IDR {{number_format($fasilitas->price_perhour)}}</td>
											<td>
												@if($fasilitas->sts == '1')
												<a href="{{asset('sandwich/venue/ruangan/fasilitas/show-hide.'.base64_encode(base64_encode($fasilitas->id_room_facility)))}}" class="btn btn-sm btn-success">Ditampilkan</a>
												@else
												<a href="{{asset('sandwich/venue/ruangan/fasilitas/show-hide.'.base64_encode(base64_encode($fasilitas->id_room_facility)))}}" class="btn btn-sm btn-danger">Disembuyikan</a>
												@endif

											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="tab5">
							<!-- <div class="table-responsive"> -->
							<form action="{{url('sandwich/venue/ruangan/penggunaan-ruangan')}}" method="post">
								{{csrf_field()}}
								<input type="hidden" name="id_ruangan" value="{{base64_encode(base64_encode($ruangan->id_room))}}"/>
								<button class="btn btn-success btn-sm" type="submit"  style="margin-bottom: 10px;"><i class="fa fa-save"></i> Simpan Perubahan</button>
								<div class="form-group">
									<label>Kegunaan ruangan</label>
									<textarea class="form-control" rows="3" name="penggunaan" required>{{$ruangan->room_usage}}</textarea>
									<small>*pisahkan dengan koma (,)</small>
								</div>
							</form>
							<!-- </div> -->
						</div>
						<div class="tab-pane fade" id='tab6'>
							<form action="{{url('sandwich/venue/ruangan/pengaturan')}}" method="post">
			                  	{{csrf_field()}}
			                  	<input type="hidden" name="id_room" value="{{base64_encode(base64_encode(strval($ruangan->id_room)))}}">
			                  	<input type="hidden" name="id_venue" value="{{base64_encode(base64_encode(strval($ruangan->id_venue)))}}">
			                  	<div class="modal-body">
			                  		<div class="form-group">
			                    		<button class="btn btn-success btn-sm" type="submit" style="margin-bottom: 10px;"><i class="fa fa-save"></i> Simpan Pengaturan</button>
			                  		</div>
			                  		<div class="form-group row">
			                    		<label class="col-sm-2 control-label text-right">Nama Ruangan</label>
			                    		<div class="col-sm-10">
			                        		<input type="text" name="name" class="form-control" placeholder="Nama ruangan" value="{{$ruangan->name}}" required="required">
			                    		</div>
			                  		</div>
			                  		<div class="form-group row">
			                    		<label class="col-sm-2 control-label text-right">Kode Ruangan*</label>
			                    		<div class="col-sm-10">
			                        		<input type="text" name="room_code" class="form-control" placeholder="Kode ruangan berdasarkan tempat masing-masing" value="{{$ruangan->room_code}}">
			                    		</div>
			                  		</div>
			                  		<div class="form-group row">
			                    		<label class="col-sm-2 control-label text-right">Tipe ruangan</label>
			                    		<div class="col-sm-10">
			                        		<select class="form-control" name="room_type" required="required">
			                          			<option value="" disabled selected> --- </option>
			                          			@foreach($roomType as $tipe)
			                          			<option value="{{$tipe->type_name}}" <?php if($tipe->type_name == $ruangan->room_type)echo "selected";?>> {{$tipe->type_name}} </option>
			                          			@endforeach
			                        		</select>
			                    		</div>
			                  		</div>
			                  		<div class="form-group row">
			                    		<label class="col-sm-2 control-label text-right">Kapasitas</label>
			                    		<div class="col-sm-10">
			                        		<input type="number" name="capacity" class="form-control" placeholder="Kapasitas ruangan" value="{{$ruangan->capacity}}">
			                    		</div>
			                  		</div>
			                  		<div class="form-group row">
			                    		<label class="col-sm-2 control-label text-right">Tinggi Langit-langit</label>
			                    		<div class="col-sm-10">
			                        		<input type="number" name="room_ceiling" class="form-control" placeholder="Tinggi langit-langit ruangan dalam meter" value="{{$ruangan->room_ceiling}}">
			                        		*dalam meter
			                    		</div>
			                  		</div>
			                  		<div class="form-group row">
			                    		<label class="col-sm-2 control-label text-right">Panjang Ruangan</label>
			                    		<div class="col-sm-10">
			                        		<input type="number" name="room_long" class="form-control" placeholder="Panjang ruangan dalam meter" value="{{$ruangan->room_long}}">
			                        		*dalam meter
			                    		</div>
			                  		</div>
			                  		<div class="form-group row">
			                    		<label class="col-sm-2 control-label text-right">Lebar Ruangan</label>
			                    		<div class="col-sm-10">
			                        		<input type="number" name="room_width" class="form-control" placeholder="Lebar ruangan dalam meter" value="{{$ruangan->room_width}}">
			                        		*dalam meter
			                    		</div>
			                  		</div>
			                  		<div class="form-group row">
			                    		<label class="col-sm-2 control-label text-right">Catatan Penggunaan Ruangan</label>
			                    		<div class="col-sm-10">
			                        		<textarea name="room_notable" class="form-control" placeholder="Catatan sebelum menggunakan ruangan">{{$ruangan->room_notable}}</textarea>
			                    		</div>
			                  		</div>
			                  		<div class="form-group row">
			                    		<label class="col-sm-2 control-label text-right">Deskripsi Ruangan</label>
			                    		<div class="col-sm-10">
			                        		<textarea name="description" class="form-control" placeholder="Deskripsi dari ruangan">{{$ruangan->description}}</textarea>
			                    		</div>
			                  		</div>

			                  		<div class="form-group row">
			                    		<label class="col-sm-2 control-label text-right">Status Ruangan</label>
			                    		<div class="col-sm-10">
			                        		<select class="form-control" name="sts" required>
			                        			<option value="0" <?php if($ruangan->sts == '0')echo "selected";?>>Tersembunyi</option>
			                        			<option value="1" <?php if($ruangan->sts == '1')echo "selected";?>>Ditampilkan</option>
			                        		</select>
			                    		</div>
			                  		</div>
			                  		<div class="form-group row">
			                    		<label class="col-sm-2 control-label text-right">Tag</label>
			                    		<div class="col-sm-10">
			                        		<textarea name="tag" class="form-control" placeholder="Tag untuk pencarian data">{{$ruangan->tag}}</textarea>
			                        		*pisahkan dengan koma(,)
			                    		</div>
			                  		</div>
		                  		</div>
			                </form>
						</div>
					</div>
					<!-- END TABBED CONTENT -->
				</div>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->

<!-- Modal -->
<div class="modal fade" id="tambahPaket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    			<h4 class="modal-title" id="myModalLabel">Tambahkan Paket</h4>
	      	</div>
	      	<form method="post" action="{{url('sandwich/venue/ruangan/paket/tambah')}}">
	      		{{csrf_field()}}
	      		<input type="hidden" name="id_ruangan" value="{{base64_encode(base64_encode($ruangan->id_room))}}">
		      	<div class="modal-body">
		      		<div class="form-group">
		      			<label>Nama Paket</label>
		      			<input class="form-control" name="nama" placeholder="Masukkan Nama Paket.." type="text" required>
		      		</div>
		      		<div class="form-group">
		      			<label>Informasi Paket</label>
		      			<textarea class="form-control" name="informasi" placeholder="Masukkan detail paket.." required></textarea>
		      		</div>
		      		<div class="form-group">
		      			<label>Aturan Pembayaran</label>
		      			<textarea class="form-control" name="pembayaran" placeholder="Masukkan aturan pembayaran paket.." required></textarea>
		      		</div>
		      		<div class="form-group">
		      			<label>Down Payment (DP)</label>
		      			<input class="form-control" name="dp" placeholder="Masukkan harga.." type="number" required>
		      		</div>
		      		<div class="form-group">
		      			<label>Harga</label>
		      			<input class="form-control" name="harga" placeholder="Masukkan harga.." type="number" required>
		      		</div>
		      		<div class="form-group">
		      			<label>Charge</label>
		      			<textarea class="form-control" name="charge"></textarea>
		      		</div>
		      		<div class="form-group">
		      			<label>Mulai</label>
		      			<input class="form-control" name="mulai" placeholder="Masukkan tanggal mulai.." type="date" required>
		      		</div>
		      		<div class="form-group">
		      			<label>Selesai</label>
		      			<input class="form-control" name="selesai" placeholder="Masukkan tanggal selesai.." type="date" required>
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
<!-- script paket -->
<script type="text/javascript">
    function setHapusPaket(id){
        $('#tombolHapusPaket').attr("href", "{{url('sandwich/venue/ruangan/paket/hapus.')}}"+id);
    }
</script>

<!-- Galeri -->
<!-- Modal -->
<div class="modal fade" id="tambahGaleri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    			<h4 class="modal-title" id="myModalLabel">Input Foto</h4>
	      	</div>
	      	<form method="post" action="{{url('sandwich/venue/ruangan/gallery/tambah')}}" enctype="multipart/form-data">
	      		{{csrf_field()}}
	      		<input type="hidden" name="id_ruangan" value="{{base64_encode(base64_encode($ruangan->id_room))}}">
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
    function setHapusGaleri(id){
        $('#tombolHapusGaleri').attr("href", "{{url('sandwich/venue/ruangan/gallery/hapus.')}}"+id);
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
	      	<form method="post" action="{{url('sandwich/venue/ruangan/fasilitas/tambah')}}" >
	      		{{csrf_field()}}
	      		<input type="hidden" name="id_ruangan" value="{{base64_encode(base64_encode($ruangan->id_room))}}">
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
	      	<div class="modal-body" style="text-align: ">
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
    function setHapusFasilitas(id){
        $('#tombolHapusFasilitas').attr("href", "{{url('sandwich/venue/ruangan/fasilitas/hapus.')}}"+id);
    }
</script>
@endsection