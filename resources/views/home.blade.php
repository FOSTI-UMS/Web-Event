<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard | WEB EVENT FOSTI UMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon-->
  <link rel="icon" href="/assets/favicon.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/font-awesome/css/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/admin.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
  <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="ring">
              Loading
              <span class="spinner"></span>
            </div>
        </div>
    </div>
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-success">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-sm-inline-block">
        <a class="nav-link" href="/" title="Homepage">Beranda</a>
      </li>
      <li class="nav-item d-sm-inline-block">
        <a class="nav-link" title="Blog Fosti" href="http://fosti.ums.ac.id/blog">Blog</a>
      </li>
      <li class="nav-item d-sm-inline-block">
        <a class="nav-link" title="Source Code" href="http://github.com/fosti">Source Code</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="http://fosti.ums.ac.id" title="FOSTI UMS" class="brand-link elevation-4">
      <div class="brand-text font-weight-bold"><span>F</span><span style="color: red;">OS</span><span>TI UMS</span></div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/images/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Aezo27 | Rama Sullivan</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/omah" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">EVENT</li>
          <li class="nav-item">
            <a href="/omah/daftar" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Daftar Event
                <span class="badge badge-info right">{{ $events->count() }}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/omah/create" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>
                New Event
              </p>
            </a>
          </li>
          <li class="nav-header">USER</li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Admin</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title font-weight-bold">WEB EVENT</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                WEB Event digunakan untuk menyebarluaskan serta memberi informasi seputar acara FOSTI Universitas Muhammadiyah Surakarta yang akan datang...
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                07 September 2019
              </div>
              <!-- /.card-footer-->
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title font-weight-bold">Latest Updates</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <span class="font-weight-bold">Pembaruhan Sistem :</span><br>
              - Optimalisasi Tampilan Antarmuka<br>
              - Halaman Maintenance<br>
              - Pembaruan QrCode<br>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <span  class="font-weight-bold" style="font-size: large;">v1.7.0</span><br>
                10 Oktober 2019
              </div>
              <!-- /.card-footer-->
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title font-weight-bold">Previous Updates</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <span class="font-weight-bold">Pembaruhan Sistem :</span><br>
              - Pembaruan Halaman Admin<br>
              - Penambahan Fitur Konfirmasi Delete<br>
              - Penambahan Fitur Cek Data Peserta<br>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <span  class="font-weight-bold" style="font-size: large;">v1.3.0</span><br>
                23 September 2019
              </div>
              <!-- /.card-footer-->
              
            </div>
            <!-- /.card -->
           <div class="card">
              <div class="card-header">
                <h3 class="card-title font-weight-bold">Previous Updates</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <span class="font-weight-bold">Pembaruhan Sistem :</span><br>
              - Pembaruan Antarmuka Login & Reset Password<br>
              - Penambahan Sistem Alert PopUp<br>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <span  class="font-weight-bold" style="font-size: large;">v1.0.1</span><br>
                07 September 2019
              </div>
              <!-- /.card-footer-->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright © 2019  |<a href="http://fosti.ums.ac.id"> FOSTI </a>| </strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/js/bootstrap.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<!-- Validation Plugin Js -->
<script src="/assets/js/jquery.validate.js"></script>
<!-- Sweetalert Js -->
<script src="/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
@include('sweet::alert')
<!-- Custom Js -->
<script src="assets/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 50);
    })
</script>
    @if (session('status'))
        <script type='text/javascript'>
            function berhasil() {
                swal({
                    title: '{{ session('status') }}',
                    type: 'success',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#4caf50',
                    reverseButtons: true,
                    focusConfirm: true,
                 });
            }
        </script>
        <script>berhasil();</script>
    @endif
</body>
</html>

