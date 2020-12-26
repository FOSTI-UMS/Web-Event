<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Peserta | WEB EVENT FOSTI UMS</title>
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
  <!-- DataTables -->
  <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
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
          <li class="nav-item menu-open">
            <a href="/omah/daftar" class="nav-link active">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Daftar Event
                <i class="right fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{ $events->count() }}</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/omah/data/{{$events->slug}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Data Peserta
                    <span class="badge badge-info right" style="background-color:#28a745">{{ $participant->count() }}</span>
                  </p>
                </a>
              </li>
            </ul>
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
            <h1>Event List Editor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/omah">Home</a></li>
              <li class="breadcrumb-item"><a href="/omah/daftar">Event List</a></li>
              <li class="breadcrumb-item active">Data Peserta - {{$data}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Event List</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="download">
            <a class="btn btn-primary btn-sm" href="/{{$download}}/download">
              <i class="fas fa-arrow-down">
              </i>
              Download Data Peserta
            </a>
          </div>
          <table id="tabel" class="table table-bordered table-striped table-hover projects">
              <thead>
                  <tr>
                      <th style="width: 5%" class="text-center">
                          No
                      </th>
                      <th style="width: 25%" class="text-center">
                          Nama
                      </th>
                      <th style="width: 15%" class="text-center">
                          Instansi
                      </th>
                      <th style="width: 20%" class="text-center">
                          Email
                      </th>
                      <th style="width: 20%" class="text-center">
                          No. Hp
                      </th>
                      <th style="width: 15%"  class="text-center">
                        Opsi
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($participant as $partici => $participant)
                  <tr>
                      <td class="text-center">
                         {{ $partici +1 }}
                      </td>
                      <td>
                              {{ $participant->nama }} 
                      </td>
                      <td>
                          <span>{{$participant->nim}}</span>
                      </td>
                      <td>
                          <span>{{$participant->email}}</span>
                      </td>
                      <td>
                          <span>{{$participant->hp}}</span>
                      </td>
                      <td class="project-actions text-center">
                          <button class="btn btn-danger btn-sm" onclick="deleteConfirmation({{$participant->id}})">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                            </button>
                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

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
<!-- DataTables -->
<script src="/assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script> 
<!-- Validation Plugin Js -->
<script src="/assets/js/jquery.validate.js"></script>
<!-- Sweetalert Js -->
<script src="/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
@include('sweet::alert')
<!-- Custom Js -->
<script src="/assets/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 50);
    })
</script>
<!-- page script -->
<script type="text/javascript">
  $(function () {
    $("#tabel").DataTable({
    "responsive": true,
    "scrollX": true,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true,
    });
  });
</script>
<script type="text/javascript">
  function deleteConfirmation(id) {
    swal({
      title: 'Apakah Anda Yakin?',
      text: "Data akan dihapus secara permanen !",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then(function (result) {
        if (result.value) {
          window.location.href = '/omah/data/delete/'+ id;
        } else {
          // handle cancel
        }
    })
  }
</script>
</body>
</html>