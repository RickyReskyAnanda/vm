<section class=" bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
        <ul class="list-inline mb-2">
          <li class="list-inline-item">
            <a href="{{url('tentang-kami')}}">Tentang Kami</a>
          </li>
          <li class="list-inline-item">⋅</li>
          <li class="list-inline-item">
            <a href="{{url('kontak')}}">Kontak</a>
          </li>
          <!-- <li class="list-inline-item">⋅</li>
          <li class="list-inline-item">
            <a href="#">Terms of Use</a>
          </li>
          <li class="list-inline-item">⋅</li>
          <li class="list-inline-item">
            <a href="#">Privacy Policy</a>
          </li> -->
        </ul>
        <p class="text-muted small mb-4 mb-lg-0">© Copyright Ceklokasi.id 2018. All Rights Reserved.</p>
      </div>
      <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
        <ul class="list-inline mb-0">
          <li class="list-inline-item mr-3">
            <a href="#">
              <i class="fa fa-facebook fa-2x fa-fw"></i>
            </a>
          </li>
          <li class="list-inline-item mr-3">
            <a href="#">
              <i class="fa fa-twitter fa-2x fa-fw"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <i class="fa fa-instagram fa-2x fa-fw"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
@if(!Auth::check())
@include('homepage.user.daftar')
@include('homepage.user.login')
@endif