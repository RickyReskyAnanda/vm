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
        <table id="tabel1" class="table table-bordered table-striped">
          <thead>
          <tr>
						<th width="5%">No</th>
						<th>Nama Venue</th>
						<th>Alamat</th>
						<th>Lokasi</th>
						<th>Pemesanan</th>
						<th>Kerja Sama</th>
					</tr>
          </thead>
          <tbody>
					@foreach($venue as $venues)
					<tr>
						<td><a href="{{url('sandwich/venue/detail.'.base64_encode(base64_encode($venues->id_venue)))}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a></td>
						<td>{{$venues->venue_name}}</td>
						<td>{{$venues->address}}</td>
						<td>-</td>
						<td>-</td>
						<td>
							@if($venues->cooperate == '1')
							<span class="label label-success"><b>Telah Bekerja Sama</b></span>
							@else
							<span class="label label-danger"><b>Belum Bekerja Sama</b></span>
							@endif
						</td>
					</tr>
					@endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
@endsection