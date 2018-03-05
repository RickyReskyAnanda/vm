@extends('administrator.index')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  	<section class="content-header">
    	<h5>Venue</h5>
    	<ol class="breadcrumb">
      		<li><a href="{{url('sandwich')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      		<li class="active">Venue</li>
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
        	<h3 class="box-title">List Venue</h3>

        	<div class="box-tools pull-right">
          		<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            	<i class="fa fa-minus"></i></button>
        	</div>
      </div>
      <div class="box-body">
		<!-- Button trigger modal -->
		<table class="table" id="dataTable">
			<thead>
				<tr>
					<th width="5%"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahTipeVenue"><i class="fa fa-plus"></i></button></th>
					<th width="5%">No</th>
					<th>Nama Tipe Venue</th>
					<th>Tipe</th>
					<th>Aktif</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1;?>
				@foreach($data as $tipe)
				<tr>
					<td>
						@if(count($tipe->getHomeType) < 1)
						<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusTipeVenue" onclick="setHapus('{{base64_encode(base64_encode(strval($tipe->id_venue_type)))}}')"><i class="fa fa-trash"></i></button>
						@endif
					</td>
					<td>{{$i++}}</td>
					<td>{{$tipe->name}}</td>
					<td>
						@if($tipe->type == '0')
							<b>Meja</b>
						@elseif($tipe->type == '1')
							<b>Ruangan</b>
						@elseif($tipe->type == '2')
							<b>Venue</b>
						@endif
					</td>
					<td>
						@if($tipe->sts == '1')
						<a href="{{url('sandwich/master-data/tipe-venue/status_'.base64_encode(base64_encode(strval($tipe->id_venue_type))))}}" class="btn btn-success">Aktif</a>
						@else
						<a href="{{url('sandwich/master-data/tipe-venue/status_'.base64_encode(base64_encode(strval($tipe->id_venue_type))))}}" class="btn btn-warning">Tidak Aktif</a>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- Modal -->
<div class="modal fade" id="tambahTipeVenue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    			<h4 class="modal-title" id="myModalLabel">Daftarkan Venue Baru</h4>
	      	</div>
	      	<form method="post" action="{{url('sandwich/master-data/tipe-venue/tambah')}}">
	      		{{csrf_field()}}
		      	<div class="modal-body">
		      		<div class="form-group">
		      			<label>Nama Tipe Venue</label>
		      			<input class="form-control" name="nama" placeholder="Masukkan Nama Tipe Venue.." type="text" required>
		      		</div>
		      		<div class="form-group">
		      			<label>Metode Pemesanan</label>
		      			<select class="form-control" name="metode" required="required">
		      				<option value="" disabled="disabled" selected="selected"> --- </option>
		      				<option value="0">Meja</option>
		      				<option value="1">Room</option>
		      				<option value="2">Venue</option>
		      			</select>
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

<div class="modal fade" id="hapusTipeVenue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog modal-sm" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    			<h4 class="modal-title" id="myModalLabel">Hapus Tipe Venue</h4>
	      	</div>
	      	<div class="modal-body" style="text-align:center; ">
	      		<h4>Ingin menghapus tipe venue ?</h4>
	      		<p>Data tidak dapat dikembalikan !</p>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        	<a href="" class="btn btn-danger" id="tombolHapus">Hapus</a>
	      	</div>
    	</div>
  	</div>
</div>
<script type="text/javascript">
    function setHapus(id){
        $('#tombolHapus').attr("href", "{{url('sandwich/master-data/tipe-venue/hapus_')}}"+id);
    }
</script>
@endsection