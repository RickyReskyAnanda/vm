<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Ceklokasi.id - Temukan Tempat Terbaik Anda</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('assets/administrator/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

	<link rel="stylesheet" href="{{asset('assets/administrator/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/administrator/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('assets/administrator/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('assets/administrator/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/administrator/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/administrator/img/favicon.png')}}">
	<script src="{{asset('assets/administrator/vendor/jquery/jquery.min.js')}}"></script>
	<style type="text/css">
		.label{
			font-size: 100%;
		}
	</style>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="{{asset('assets/administrator/img/logo-dark.png')}}" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<!-- <form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Search dashboard...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div>
				</form> -->
				<div class="navbar-btn" style="margin-left:30px;">
					<a class="btn btn-danger" href="javascript:;" data-toggle="modal" data-target="#tambahVenue"><i class="fa fa-plus"></i> <span>TAMBAH VENUE</span></a>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<!-- <li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger">5</span>
							</a>
							<ul class="dropdown-menu notifications">
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
								<li><a href="#" class="more">See all notifications</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Basic Use</a></li>
								<li><a href="#">Working With Data</a></li>
								<li><a href="#">Security</a></li>
								<li><a href="#">Troubleshooting</a></li>
							</ul>
						</li> -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('assets/administrator/img/user.png')}}" class="img-circle" alt="Avatar"> <span>Samuel</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="{{url('sandwich/logout')}}"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{url('sandwich/beranda')}}" class="active"><i class="lnr lnr-home"></i> <span>Beranda</span></a></li>
						<li><a href="{{url('sandwich/venue')}}" class=""><i class="lnr lnr-code"></i> <span>Venue</span></a></li>
						<li>
							<a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Master Data</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages1" class="collapse ">
								<ul class="nav">
									<li><a href="{{url('sandwich/master-data/kategori-tempat')}}" class="">Kategori Tempat</a></li>
									<li><a href="{{url('sandwich/master-data/kategori-kegiatan')}}" class="">Kategori Kegiatan</a></li>
									<li><a href="{{url('sandwich/master-data/data-lokasi')}}" class="">Data Lokasi</a></li>
									<li><a href="{{url('sandwich/master-data/user-admin')}}" class="">User Admin</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		@yield('content')
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
				      			<label>Jenis Venue</label>
				      			<select class="form-control" name="jenis" required>
				      				<option value="" disabled selected> --- </option>
				      				<option value="sosial">Sosial</option>
				      				<option value="keluarga">Keluarga</option>
				      				<option value="bisnis">Bisnis</option>
				      				<option value="perusahaan">Perusahaan</option>
				      			</select>
				      		</div>
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
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

	<script src="{{asset('assets/administrator/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/administrator/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	
	<script src="{{asset('assets/administrator/scripts/klorofil-common.js')}}"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#dataTable').DataTable();
		} );
	</script>
</body>

</html>
