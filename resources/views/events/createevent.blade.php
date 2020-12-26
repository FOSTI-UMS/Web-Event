<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>New Event | WEB EVENT FOSTI UMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon-->
  <link rel="icon" href="/assets/favicon.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/plugins/font-awesome/css/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/css/admin.css">
  <!-- Boostrap DateTimePicker -->
  <link rel="stylesheet" href="/assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css">
  <!-- CSS sweetalert -->
  <link rel='stylesheet' href='/assets/plugins/sweetalert2/sweetalert2.min.css'>
  <!-- Custom Css -->
{{--   <link href="/assets/css/style.css" rel="stylesheet"> --}}
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
          <img src="/assets/images/user.png" class="img-circle elevation-2" alt="User Image">
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
            <a href="/omah" class="nav-link">
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
            <a href="/omah/create" class="nav-link active">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>
                New Event
              </p>
            </a>
          </li>
          <li class="nav-header">USER</li>
          {{-- <li class="nav-item">
            <a href="/Dont_T3llMe/new" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                New
              </p>
            </a>
          </li> --}}
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
            <h1>New Event</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/omah">Home</a></li>
              <li class="breadcrumb-item active">New Event</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="/omah" method="post" enctype="multipart/form-data" id="validasi">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="namaevent">Nama event</label>
                <input type="text" class="form-control" id="namaevent" placeholder="Nama Event" name="namaevent" required autofocus>
              </div>
              <div class="form-group">
                <label for="max">Kuota Peserta</label>
                <input type="number" min="1" name="max" class="form-control" id="" placeholder="Kuota Peserta" required>
              </div>
              <div class="form-group">
                <label for="namaevent">Tempat Event</label>
                <input type="text" class="form-control" id="tempat" placeholder="Alamat" name="tempat" required>
              </div>
              <div class="form-group">
                 <label for="tanggal">Tanggal/Waktu</label>
                 <div class="date form_datetime" style="white-space: nowrap;">
                    <input class="form-control type="text" name="tgl" style="display: inline-block;" required>
                    <span class="add-on" style="cursor: pointer;"><i class="icon-th"></i></span>
                 </div>
              </div>
              <div class="form-group" id="jarak">
                <label for="pamfelt">Pamflet</label>
                <input type="file" id="file" accept="image/*" name="pamflet" class="form-control-file">
                <small class="form-text text-muted" style="color:#ce0000 !important; font-weight:bold;">Max Size 2MB | Kosong = Default</small>
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi event</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" required></textarea>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Information</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="biaya">HTM</label>
                <input type="text" class="form-control" id="biaya" name="biaya" value="" data-type="currency" placeholder="Rp 0.00">
                <small class="form-text text-muted" style="color:#ce0000 !important; font-weight:bold;">Kosong = Free</small>
              </div>
              <div class="form-group">
                <label for="cp">Contact</label>
                <input type="text" class="form-control" id="cp" placeholder="bit.ly/haloFOSTI" name="cp" required>
              </div>
              {{-- <div class="form-group">
                <label for="cp">Sekretariat</label>
                <input type="text" class="form-control" id="cp" aria-describedby="emailHelp" value="Gedung J Lt. 3, Kampus 2, Universitas Muhammadiyah Surakarta" readonly name="cp">
              </div> --}}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row bot">
        <div class="col-12">
          <input type="Reset" class="btn btn-secondary waves-effect" value="Cancel">
          <input type="submit" value="Create New Event" class="btn btn-success float-right waves-effect">
        </div>
      </div>
    </form>
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
<script src="/assets/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/js/bootstrap.js"></script>
<!-- AdminLTE App -->
<script src="/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/assets/dist/js/demo.js"></script>
<!-- Bootstrap DateTimePicker -->
<script src="/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<!-- Sweetalert Js -->
<script src="/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    });
</script>     
<script type="text/javascript">
  $(document).ready(function(){
      setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 50);
    })
</script>
<!-- Validation Plugin Js -->
<script src="/assets/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $("#validasi").validate();
    });
</script>
<!-- Custom Js -->
<script src="/assets/js/main.js"></script>
</body>
</html>

