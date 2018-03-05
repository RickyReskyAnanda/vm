@extends('administrator.index')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  	<section class="content-header">
    	<h5>Tipe venue</h5>
    	<ol class="breadcrumb">
      		<li><a href="{{url('sandwich')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      		<li class="active">Users</li>
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
	        	<h3 class="box-title">Daftar User</h3>

	        	<div class="box-tools pull-right">
	          		<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
	                  title="Collapse">
	            	<i class="fa fa-minus"></i></button>
	        	</div>
	      	</div>
		    <div class="box-body">
				<!-- Button trigger modal -->
				<table class="table">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Key</th>
							<th>Aktif</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1;?>
						@foreach($data as $user)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->key_pw}}</td>
							<td>
								@if($user->active == '1')
								Aktif
								@elseif($user->active == '2')
								Terhapus
								@elseif($user->active == '3')
								Terblokir
								@elseif($user->active == '0')
								Belum Aktif
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center">
						 <ul class="pagination">
						  <li class="page-item"><a class="page-link" href="{{$data->url(1)}}">First</a></li>
						  <li class="page-item"><a class="page-link" href="{{$data->previousPageUrl()}}">Previous</a></li>
						  <li class="page-item"><a class="page-link" href="{{$data->nextPageUrl()}}">Next</a></li>
						  <li class="page-item"><a class="page-link" href="{{$data->lastPage()}}">Last</a></li>
						</ul> 
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END MAIN CONTENT -->
</div>
@endsection