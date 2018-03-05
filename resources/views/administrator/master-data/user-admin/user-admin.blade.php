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
        <a href="{{url('sandwich/master-data/user-admin/tambah')}}" class="btn btn-success" >Tambah User</a>
        <!-- Button trigger modal -->
        <table class="table">
          <thead>
            <tr>
              <th width="8%">Aksi</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Telp</th>
              <th>Posisi</th>
              <th>Level</th>
              <th>Telp</th>
              <th>Key</th>
              <th>Aktif</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $user)
            <tr>
              <td>
                <a href="{{url('sandwich/master-data/user-admin/edit_'.$user->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                <a href="javascript:;" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusData" onclick="setHapus({{$user->id}})"><i class="fa fa-trash"></i></a>
              </td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->phone}}</td>
              <td>{{$user->position}}</td>
              <td>{{$user->level}}</td>
              <td>{{$user->phone}}</td>
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
              <li class="page-item"><a class="page-link" href="{{$data->url($data->lastPage())}}">Last</a></li>
            </ul> 
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END MAIN CONTENT -->
</div>

<div class="modal fade" id="hapusData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
          </div>
          <div class="modal-body" style="text-align: ">
            <h4>Ingin menghapus data ?</h4>
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
      $('#tombolHapus').attr("href", "{{url('sandwich/master-data/user-admin/hapus_')}}"+id);
  }
</script>
@endsection