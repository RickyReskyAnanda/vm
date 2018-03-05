@extends('administrator.index')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  	<section class="content-header">
    	<h5>Tipe Ruangan</h5>
    	<ol class="breadcrumb">
      		<li><a href="{{url('sandwich')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      		<li>Master Data</li>
      		<li class="active">Tipe Ruangan</li>
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
        	<h3 class="box-title">Tipe Ruangan</h3>

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
						<th width="5%"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahTipeRuangan"><i class="fa fa-plus"></i></button></th>
						<th>No</th>
						<th>Nama Tipe Ruangan</th>
						<th>Tag Label</th>
						<th>Aktif</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1;?>
					@foreach($data as $tipe)
					<tr>
						<td>
							<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusTipeVenue" onclick="setHapus('{{base64_encode(base64_encode(strval($tipe->id_room_type)))}}')"><i class="fa fa-trash"></i></button>
						</td>
						<td>{{$tipe->type_name}}</td>
						<td>{{$tipe->tag}}</td>
						<td>
							@if($tipe->sts == '1')
							<a href="{{url('sandwich/master-data/tipe-ruangan/status_'.base64_encode(base64_encode(strval($tipe->id_room_type))))}}" class="btn btn-success">Aktif</a>
							@else
							<a href="{{url('sandwich/master-data/tipe-ruangan/status_'.base64_encode(base64_encode(strval($tipe->id_room_type))))}}" class="btn btn-warning">Tidak Aktif</a>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- Modal -->
<div class="modal fade" id="tambahTipeRuangan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    			<h4 class="modal-title" id="myModalLabel">Tambahkan Tipe Ruangan</h4>
	      	</div>
	      	<form method="post" action="{{url('sandwich/master-data/tipe-ruangan/tambah')}}">
	      		{{csrf_field()}}
		      	<div class="modal-body">
		      		<div class="form-group">
		      			<label>Nama Tipe Ruangan</label>
		      			<input class="form-control" name="name" value="{{old('name')}}" placeholder="Masukkan Nama Tipe Venue.." type="text" required>
		      		</div>
		      		<div class="form-group">
		      			<label>Tag Label</label>
		      			<input class="form-control" name="tag" value="{{old('tag')}}" placeholder="Pisahkan dengan koma(,)" type="text" required>
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
    			<h4 class="modal-title" id="myModalLabel">Hapus Tipe Ruangan</h4>
	      	</div>
	      	<div class="modal-body" style="text-align:center; ">
	      		<h4>Ingin menghapus tipe ruangan ?</h4>
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
        $('#tombolHapus').attr("href", "{{url('sandwich/master-data/tipe-ruangan/hapus_')}}"+id);
    }
</script>
@endsection