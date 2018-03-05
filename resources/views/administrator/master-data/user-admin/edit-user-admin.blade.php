
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
      <li class="active">Edit User Admin</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Edit User Admin</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" action="{{url('sandwich/master-data/user-admin/edit')}}" method="post" >
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$detail->id}}">
        <div class="box-body">
          <div class="form-group">
            <label  class="col-sm-2 control-label">Nama</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" placeholder="Nama" value="{{$detail->name}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>

            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" placeholder="Email" value="{{$detail->email}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">HP</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="telp" placeholder="HP" value="{{$detail->phone}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Posisi</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="posisi" placeholder="Posisi" value="{{$detail->position}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Level</label>

            <div class="col-sm-10">
              <select class="form-control" name="level">
                <option value="pancake" <?php if($detail->level=='pancake')echo "selected";?>>Pancake</option>
                <option value="sandwich" <?php if($detail->level=='sandwich')echo "selected";?>>Sandwich</option>
                <option value="burger" <?php if($detail->level=='burger')echo "selected";?>>Burger</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Active</label>
            <div class="col-sm-10">
              <select class="form-control" name="active">
                <option value="0" <?php if($detail->active=='0')echo "selected";?>>Belum Aktif</option>
                <option value="1" <?php if($detail->active=='1')echo "selected";?>>Aktif</option>
                <option value="3" <?php if($detail->active=='3')echo "selected";?>>Blokir</option>
              </select>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{url('sandwich/master-data/user-admin')}}" class="btn btn-default">Cancel</a>
          <button type="submit" class="btn btn-info pull-right">Save</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
  </section>
  <!-- END MAIN CONTENT -->
</div>
@endsection