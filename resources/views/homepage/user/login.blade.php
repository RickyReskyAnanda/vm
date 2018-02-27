
<!-- Modal -->
<div class="modal fade" id="loginUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Silahkan login !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        @if (session('reg_pesan'))
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                {{session('reg_pesan')}}
            </div>
        @endif
        @if (session('reg_error'))
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                {{session('reg_error')}}
            </div>
        @endif
        @if (session('log_error'))
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                {{session('log_error')}}
            </div>
        @endif
        <form action="{{url('login')}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
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
            <button type="submit" class="btn btn-success btn-block">Login</button>
          </div>
        </form>
        <hr/>
        <div class="form-group text-center">
          <label>Tidak punya akun? <a href="javascript:;" id="loginToDaftar"><b>Daftar</b></a></label>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#loginToDaftar').click(function(){
      $('#loginUser').modal('hide');
      $('#daftarUser').modal('show');
    });
    <?php if(session('reg_pesan')){?>
      $('#loginUser').modal('show');
    <?php }
     if(session('reg_error')){?>
      $('#loginUser').modal('show');
    <?php }
     if(session('log_error')){?>
      $('#loginUser').modal('show');
    <?php }?>
  });
</script>