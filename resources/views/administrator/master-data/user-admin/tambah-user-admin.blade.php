
@extends('administrator.index')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h5>Venue</h5>
    <ol class="breadcrumb">
      <li><a href="{{url('sandwich')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li>Master Data</li>
      <li><a href="{{url('sandwich/master-data/user-admin')}}">User Admin</a></li>
      <li class="active">Tambah User Admin</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah User Admin</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" action="{{url('sandwich/master-data/user-admin/tambah')}}" method="post" >
        {{csrf_field()}}
        <div class="box-body">
          <div class="form-group">
            <label  class="col-sm-2 control-label">Nama</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" placeholder="Nama" value="{{old('name')}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>

            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">HP</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="telp" placeholder="HP" value="{{old('telp')}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Posisi</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="posisi" placeholder="Posisi" value="{{old('posisi')}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Level</label>

            <div class="col-sm-10">
              <select class="form-control" name="level">
                <option value="pancake" <?php if(old('level')=='pancake')echo "selected";?>>Pancake</option>
                <option value="sandwich" <?php if(old('level')=='sandwich')echo "selected";?>>Sandwich</option>
                <option value="burger" <?php if(old('level')=='burger')echo "selected";?>>Burger</option>
              </select>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="reset" class="btn btn-default">Cancel</button>
          <button type="submit" class="btn btn-info pull-right">Daftar</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
  </section>
  <!-- END MAIN CONTENT -->
</div>
@endsection