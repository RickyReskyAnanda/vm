<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('assets/admin/bower_components/Ionicons/css/ionicons.min.css')}}">

  <!-- <link rel="stylesheet" href="{{asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/admin/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('assets/admin/dist/css/skins/_all-skins.min.css')}}">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<!-- jQuery 3 -->
<script src="{{asset('assets/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>CL</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>CL</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
	  <div class="navbar-custom-menu">
	    <ul class="nav navbar-nav">
	      <!-- Messages: style can be found in dropdown.less-->
	      <li class="dropdown messages-menu">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	          <i class="fa fa-envelope-o"></i>
	          <span class="label label-success">4</span>
	        </a>
	        <ul class="dropdown-menu">
	          <li class="header">You have 4 messages</li>
	          <li>
	            <!-- inner menu: contains the actual data -->
	            <ul class="menu">
	              <li><!-- start message -->
	                <a href="#">
	                  <div class="pull-left">
	                    <img src="{{asset('assets/admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
	                  </div>
	                  <h4>
	                    Support Team
	                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
	                  </h4>
	                  <p>Why not buy a new awesome theme?</p>
	                </a>
	              </li>
	              <!-- end message -->
	              <li>
	                <a href="#">
	                  <div class="pull-left">
	                    <img src="{{asset('assets/admin/dist/img/user3-128x128.jpg')}}" class="img-circle" alt="User Image">
	                  </div>
	                  <h4>
	                    AdminLTE Design Team
	                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
	                  </h4>
	                  <p>Why not buy a new awesome theme?</p>
	                </a>
	              </li>
	              
	            </ul>
	          </li>
	          <li class="footer"><a href="#">See All Messages</a></li>
	        </ul>
	      </li>
	      <!-- Notifications: style can be found in dropdown.less -->
	      <li class="dropdown notifications-menu">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	          <i class="fa fa-bell-o"></i>
	          <span class="label label-warning">10</span>
	        </a>
	        <ul class="dropdown-menu">
	          <li class="header">You have 10 notifications</li>
	          <li>
	            <!-- inner menu: contains the actual data -->
	            <ul class="menu">
	              <li>
	                <a href="#">
	                  <i class="fa fa-users text-aqua"></i> 5 new members joined today
	                </a>
	              </li>
	              <li>
	                <a href="#">
	                  <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
	                  page and may cause design problems
	                </a>
	              </li>
	              <li>
	                <a href="#">
	                  <i class="fa fa-users text-red"></i> 5 new members joined
	                </a>
	              </li>
	              <li>
	                <a href="#">
	                  <i class="fa fa-shopping-cart text-green"></i> 25 sales made
	                </a>
	              </li>
	              <li>
	                <a href="#">
	                  <i class="fa fa-user text-red"></i> You changed your username
	                </a>
	              </li>
	            </ul>
	          </li>
	          <li class="footer"><a href="#">View all</a></li>
	        </ul>
	      </li>
	      <!-- User Account: style can be found in dropdown.less -->
	      <li class="user user-menu">
	        <a href="{{url('sandwich/logout')}}">
	          <span class="hidden-xs"><i class="fa fa-sign-out"></i> Keluar</span>
	        </a>
	      </li>
	    </ul>
	  </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="padding-bottom: 50px;">
        <div class="pull-left info" style="left: 0;">
          <p>{{ucwords(Auth::guard('admin')->user()->name)}}</p>
          <span><i class="fa fa-circle text-success"></i> Online</span>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{url('sandwich/beranda')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="{{url('sandwich/venue')}}"><i class="fa fa-map-marker"></i> <span>Venue</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('sandwich/master-data/tipe-venue')}}"><i class="fa fa-circle-o"></i> Tipe Venue</a></li>
            <li><a href="{{url('sandwich/master-data/tipe-ruangan')}}"><i class="fa fa-circle-o"></i> Tipe Ruangan</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Lokasi
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('sandwich/master-data/lokasi/kecamatan')}}"><i class="fa fa-circle-o"></i> Kecamatan</a></li>
                <li><a href="{{url('sandwich/master-data/lokasi/kabupaten-kota')}}"><i class="fa fa-circle-o"></i> Kabupaten/Kota</a></li>
                <li><a href="{{url('sandwich/master-data/lokasi/provinsi')}}"><i class="fa fa-circle-o"></i> Provinsi</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Homepage
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('sandwich/master-data/home-type')}}"><i class="fa fa-circle-o"></i> Tipe Venue</a></li>
                <li><a href="{{url('sandwich/master-data/homepage/kabupaten-kota')}}"><i class="fa fa-circle-o"></i> Kabupaten/Kota</a></li>
              </ul>
            </li>
            <li><a href="{{url('sandwich/master-data/user-admin')}}"><i class="fa fa-circle-o"></i> User Admin</a></li>
          </ul>
        </li>
        <li>
          <a href="{{url('sandwich/pendaftaran-partner')}}">
            <i class="fa fa-user"></i> <span>Pendaftar Partner</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">100</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{url('sandwich/users')}}">
            <i class="fa fa-user"></i> <span>Users</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">12 M</small>
            </span>
          </a>
        </li>
        <li class="header">Penting !</li>
        <li><a href="#"><i class="fa fa-gear text-red"></i> <span>Pengaturan Web</span></a></li>
        <li><a href="#"><i class="fa fa-user text-yellow"></i> <span>Pengaturan Akun</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://ceklokasi.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.7 -->
<script src="{{asset('assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('assets/admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/admin/dist/js/adminlte.min.js')}}"></script>
<!-- Sparkline -->
<!-- <script src="{{asset('assets/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script> -->
<!-- DataTables -->
<!-- SlimScroll -->
<script src="{{asset('assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS -->
<!-- <script src="{{asset('assets/admin/bower_components/Chart.js/Chart.js')}}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{asset('assets/admin/dist/js/pages/dashboard2.js')}}"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/admin/dist/js/demo.js')}}"></script>
<!-- <script src="{{asset('assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#tabel1').DataTable();
  })
</script> -->
</body>
</html>
