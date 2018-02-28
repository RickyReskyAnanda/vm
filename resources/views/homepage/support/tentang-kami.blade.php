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

  <body id="page-top">

    <!-- Navigation -->
    @include('homepage.navbar-home')

    <section class="mt-5" >
      <div class="container">
        @if(session('pesan'))
          <div class="alert alert-success alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              {{session('pesan')}}
          </div>
        @endif
        <div class="row">
          <div class="col-lg-12">
            <h3 class="section-heading">Tentang Kami</h3>
          </div>
        </div>
      </div>
      <div class="container">
        
        <div class="row">
          <div class="col">
      			<p>Ceklokasi adalah layanan reservasi dan booking venue, ruangan, dan meja online secara mudah dan cepat. Ceklokasi menampilkan hasil pencarian venue dan setelah memilih hasil pencarian, anda dapat melakukan reservasi dan booking.</p>

      			<p>Ceklokasi bermitra dengan sejumlah penyedia venue yang memiliki sumber daya dan kesempatan untuk mengubah gagasan menjadi operasi yang berfungsi dan mengembangkan bisnis mereka melalui kolaborasi, kemitraan, dan perluasan jaringan bisnis mereka. Kami membantu menciptakan hubungan antara profesional, pengusaha, mentor, dan investor untuk tujuan mengembangkan dan mengembangkan strategi pertumbuhan bisnis yang inovatif.</p>

          </div>
        </div> 
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="section-heading">Layanan Reservasi & Booking</h2>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 text-center">
            <div class="service-box mt-5 mx-auto">
              <img src="{{asset('images/home/icon/resort.png')}}">
              <h3 class="mb-3">Venue</h3>
              <p class="text-muted mb-0">Cafe, Restoran, Working Space, Kantor, Gedung Serbaguna, Balai Diklat.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 text-center">
            <div class="service-box mt-5 mx-auto">
              <img src="{{asset('images/home/icon/meeting-room.png')}}">
              <h3 class="mb-3">Ruangan</h3>
              <p class="text-muted mb-0">Meeting Room, Conference Room, Ball Room, Private Dining Room</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 text-center">
            <div class="service-box mt-5 mx-auto">
              <img src="{{asset('images/home/icon/cafe.png')}}">
              <h3 class="mb-3">Meja</h3>
              <p class="text-muted mb-0">Booking Meja Restoran, Event Space.</p>
            </div>
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
            <i class="fa fa-whatsapp fa-3x mb-3 sr-contact text-success"></i>
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
