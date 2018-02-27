<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Reservasi dan Booking venue mudah, cepat secara online">
    <meta name="author" content="ceklokasi.id">

    <title>Reservasi dan Booking venue mudah, cepat secara online | Ceklokasi.id</title>

   @include('homepage.library.header')

  </head>

  <body id="page-top" style="background: #fff">

    <!-- Navigation -->
    @include('homepage.navbar-home')

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
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Solusi Sempurna Untuk Penyedia Booking Venue</h2>
            <hr class="my-4">
            <p>Anda bisa menawarkan kepada Ceklokasi Venue mana yang harus kami ajak kerjasama.</p>
            <p>Ceklokasi mempermudah reservasi dan booking serta memberikan penggunaan sistem Ceklokasi khusus untuk pengelolaan venue.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-whatsapp fa-3x mb-3 sr-contact"></i>
            <p>081-355-553-758</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:cs@ceklokasi.id">cs@ceklokasi.id</a>
            </p>
          </div>
        </div>
      </div>
    </section> 

    @include('homepage.footer')

    <!-- Bootstrap core JavaScript -->
    @include('homepage.library.footer')

  </body>

</html>
