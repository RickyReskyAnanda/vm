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
        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahVenue"><i class="fa fa-plus"></i> Tambah Venue</button>
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
<!-- Modal -->
<div class="modal fade" id="tambahVenue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Daftarkan Venue Baru</h4>
        </div>
        <form method="post" action="{{url('sandwich/venue/tambah')}}">
          {{csrf_field()}}
          <div class="modal-body">
            <div class="alert alert-warning">(*) Boleh Kosong. Namun Sebaiknya Di isi</div>
            <div class="form-group">
              <label>Nama Venue</label>
              <input class="form-control" name="nama" placeholder="Masukkan Nama Venue.." type="text" required>
            </div>
            <div class="form-group">
              <label>Kontak*</label>
              <input class="form-control" name="kontak" placeholder="Masukkan Kontak yang dapat dihubungi.." type="text">
            </div>
            <div class="form-group">
              <label>Nomor Telpon Kantor*</label>
              <input class="form-control" name="nomor_kantor" placeholder="Masukkan Nomor telpon kantor.." type="text">
            </div>
            <div class="form-group">
              <label>Email Kantor*</label>
              <input class="form-control" name="email_kantor" placeholder="Masukkan email kantor.." type="email">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input class="form-control" name="alamat" placeholder="Masukkan Alamat Venue.." type="text" required>
            </div>
            <div class="form-group">
              <label>Informasi</label>
              <textarea class="form-control" name="informasi" placeholder="Masukkan Informasi Penting.."></textarea>
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
@endsection