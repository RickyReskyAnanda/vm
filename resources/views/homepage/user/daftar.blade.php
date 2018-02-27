
<!-- Modal -->
<div class="modal fade" id="daftarUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Daftar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if (session('reg_error_cek'))
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                {{session('reg_error_cek')}}
            </div>
        @endif
        <form action="{{url('daftar')}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Nama Lengkap" required="required">
            @if ($errors->has('name'))
                <span class="text-danger">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required="required">
            @if ($errors->has('email'))
                <span class="text-danger">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            @if ($errors->has('password'))
                <span class="text-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group text-right">
            <a href="">Lupa Password ?</a>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Daftar</button>
          </div>
        </form>
        <hr/>
        <div class="form-group text-center">
          <label>Sudah punya akun Ceklokasi? <a href="javascript:;" id="daftarToLogin"><b>Login</b></a></label>
        </div>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#daftarToLogin').click(function(){
      $('#daftarUser').modal('hide');
      $('#loginUser').modal('show');
    });
    <?php if($errors->any()){?>
    $('#daftarUser').modal('show');
    <?php } ?>
    <?php if(session('reg_error_cek')){?>
    $('#daftarUser').modal('show');
    <?php } ?>
  });

</script>