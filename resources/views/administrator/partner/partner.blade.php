@extends('administrator.index')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  	<section class="content-header">
    	<h5>Tipe venue</h5>
    	<ol class="breadcrumb">
      		<li><a href="{{url('sandwich')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      		<li class="active">Pendaftar Partner</li>
    	</ol>
  	</section>
  	<!-- Main content -->
  	<section class="content">
    <!-- Default box -->
	@if (session('pesan'))
	    <div class="alert alert-success alert-dismissable">
	        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	        {{session('pesan')}}
	    </div>
	@endif
    <div class="box">
      	<div class="box-header with-border">
        	<h3 class="box-title">Pendaftar Partner</h3>

        	<div class="box-tools pull-right">
          		<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            	<i class="fa fa-minus"></i></button>
        	</div>
      	</div>
	    <div class="box-body">
			<!-- Button trigger modal -->
			<div class="table-responsive">
				<table class="table table-stripped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Kontak</th>
							<th>Venue</th>
							<th>Informasi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1;?>
						@foreach($data as $partner)
						<tr>
							<td>{{$i++}}</td>
							<td>
								<p><b>Nama :</b> {{ucwords($partner->cp_nama)}}</p>
								<p><b>Email :</b> {{$partner->cp_email}}</p>
								<p><b>Telpon :</b> {{$partner->cp_telp}}</p>
								<p><b>Posisi :</b> {{$partner->cp_posisi}}</p>
							</td>
							<td>
								<p><b>Nama :</b> {{ucwords($partner->venue_nama)}}</p>
								<p><b>Alamat :</b> {{$partner->venue_alamat}}</p>
								<p><b>Daerah :</b> {{$partner->venue_kecamatan.', '.$partner->venue_kota.', '.$partner->venue_provinsi}}</p>
								<p><b>Lat :</b> {{ucwords($partner->latitude)}}</p>
								<p><b>Lng :</b> {{$partner->langitude}}</p>
							</td>
							<td>
								{{$partner->venue_informasi}}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>

@endsection