@extends('administrator.index')

@section('content')
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
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
				<div class="col-sm-4">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- PROFILE HEADER -->
							<div class="profile-header">
								<div class="overlay"></div>
								<div class="profile-main" style="background-image:url(<?php if(isset($gambarVenueProfil->url))echo $gambarVenueProfil->url;?>);padding: 100px;">
									<h3 class="name">{{$venue->venue_name}}</h3>
								</div>
								<div class="profile-stat">
									<div class="row">
										<div class="col-md-4 stat-item">
											45 <span>View</span>
										</div>
										<div class="col-md-4 stat-item">
											15 <span>Review</span>
										</div>
										<div class="col-md-4 stat-item">
											2174 <span>Order</span>
										</div>
									</div>
								</div>
							</div>
							<!-- END PROFILE HEADER -->
							<!-- PROFILE DETAIL -->
							<div class="profile-detail">
								<div class="profile-info">
									<h4 class="heading">Basic Info</h4>
									<ul class="list-unstyled list-justify">
										<li>Jenis Venue  <span class="label label-success"><b>{{strtoupper($venue->venue_kind)}}</b></span></li>
										<li>No Handphone  <span>{{$venue->contact_number}}</span></li>
										<li>No Telpon Kantor  <span>{{$venue->official_number}}</span></li>
										<li>Email Kantor <span>{{$venue->official_email}}</span></li>
										<li>Website <span><a href="{{$venue->website}}">{{$venue->website}}</a></span></li>
										<li>Alamat <span>{{$venue->address}}</span></li>
										<li>Kerja Sama <span>{{$venue->cooperate}}</span></li>
									</ul>
								</div>
								<div class="profile-info">
									<h4 class="heading">Social</h4>
									<ul class="list-inline social-icons">
										<li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#" class="google-plus-bg"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#" class="github-bg"><i class="fa fa-github"></i></a></li>
									</ul>
								</div>
								<div class="profile-info">
									<button class="btn btn-primary"> Pengaturan Profil</button>
								</div>
							</div>
							<!-- END PROFILE DETAIL -->
						</div>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">{{$ruangan->name}}</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3 col-sm-3">
									<img src="<?php if(isset($gambarProfil->url))echo $gambarProfil->url;?>" class="img-responsive img-thumbnail">
								</div>
								<div class="col-md-8 col-sm-8">
									<h4>Deskripsi</h4>
									<p>{{$ruangan->description}}</p>
								</div>
								
							</div>
							<!-- TABBED CONTENT -->
							<div class="custom-tabs-line tabs-line-bottom left-aligned">
								<ul class="nav" role="tablist">
									<li class="active"><a href="#tab1" role="tab" data-toggle="tab">Paket</a></li>
									<li><a href="#tab2" role="tab" data-toggle="tab">Harga-harga</a></li>
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
								<div class="tab-pane fade" id="tab2">
									<form action="{{url('sandwich/venue/ruangan/harga/edit')}}" method="post">
										{{csrf_field()}}
										<input type="hidden" name="id_ruangan" value="{{base64_encode(base64_encode($ruangan->id_room))}}">
										<button class="btn btn-success btn-sm" type="submit"  style="margin-bottom: 10px;"><i class="fa fa-save"></i> Simpan Perubahan</button>
										<div class="table-responsive">
											<table class="table project-table">
												<thead>
													<tr>
														<th>Kode</th>
														<th>Waktu</th>
														<th>Harga</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													@foreach($ruangan->getPrice as $harga)
													<tr>
														<td>{{$harga->room_price_code}}</td>
														<td>{{$harga->time_name}}</td>
														<td>
															
															<input type="number" class="form-control" name="{{$harga->room_price_code}}" value="{{$harga->price}}" <?php if($harga->sts != '1')echo "disabled='disabled'";?>>
															
														</td>
														<td>
															@if($harga->sts == '1')
															<a href="{{url('sandwich/venue/ruangan/harga/show-hide.'.base64_encode(base64_encode($harga->id_room_price)))}}" class="btn btn-success">Ditampilkan</a> 
															@else
															<a href="{{url('sandwich/venue/ruangan/harga/show-hide.'.base64_encode(base64_encode($harga->id_room_price)))}}" class="btn btn-danger">Disembunyikan</a> 
															@endif
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</form>
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
							</div>
							<!-- END TABBED CONTENT -->
						</div>
					</div>
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
    function setHapusPaket($id){
        $('#tombolHapusPaket').attr("href", "{{url('sandwich/venue/ruangan/paket/hapus.')}}"+$id);
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
    function setHapusGaleri($id){
        $('#tombolHapusGaleri').attr("href", "{{url('sandwich/venue/ruangan/gallery/hapus.')}}"+$id);
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
    function setHapusFasilitas($id){
        $('#tombolHapusFasilitas').attr("href", "{{url('sandwich/venue/ruangan/fasilitas/hapus.')}}"+$id);
    }
</script>
@endsection