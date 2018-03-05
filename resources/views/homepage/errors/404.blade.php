<!DOCTYPE html>
<html lang="en">

  <head>

   @include('homepage.library.header')

  </head>

  <body id="page-top" style="background: #fff">

    <!-- Navigation -->

    <section class="mt-5" >
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 style="font-size:7.5rem">Ups!</h1>
            <h2>Kami sepertinya tidak dapat menemukan halaman yang Anda cari.</h2>
            <h6>Kode kesalahan: 404</h6>
            <ul class="list-unstyled">
              <li>Berikut beberapa tautan yang bisa membantu:</li>
              <li><a href="{{url('/')}}">Beranda</a></li>
              <li><a href="{{url('search')}}">Cari</a></li>
              <li><a href="{{url('bantuan')}}">Bantuan</a></li>
              <li><a href="{{url('tentang-kami')}}">Tentang Kami</a></li>
              <li><a href="{{url('kontak')}}">Kontak</a></li>
              <li><a href="{{url('menjadi-partner')}}">Menjadi Partner</a></li>
            </ul>
          </div>
          <div class="col-md-4 col-middle text-center">
            <img src="{{asset('images/icon/not-found.png')}}" class="img-responsive">
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    @include('homepage.library.footer')

  </body>

</html>
