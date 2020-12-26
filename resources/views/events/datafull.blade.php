<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Download Data Peserta | WEB EVENT FOSTI UMS</title>
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
        <div class="card-body p-0">
          @auth
            <div class="download">
              <a class="btn btn-primary btn-sm" href="/omah/data/{{$download}}">
                <i class="fas fa-arrow-left">
                </i>
                Kembali
              </a>
            </div>
          @endauth
            <table id="tabel" class="table table-bordered table-striped table-hover projects">
              <thead>
                  <tr>
                      <th style="width: 20px !important" class="text-center">
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
                  </tr>
                @endforeach
              </tbody>
          </table>
        </div>

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
<script src="/assets/plugins/datatables/extensions/export/dataTables.buttons.min.js"></script>
<script src="/assets/plugins/datatables/extensions/export/buttons.flash.min.js"></script>
<script src="/assets/plugins/datatables/extensions/export/jszip.min.js"></script>
<script src="/assets/plugins/datatables/extensions/export/pdfmake.min.js"></script>
<script src="/assets/plugins/datatables/extensions/export/vfs_fonts.js"></script>
<script src="/assets/plugins/datatables/extensions/export/buttons.html5.min.js"></script>
<script src="/assets/plugins/datatables/extensions/export/buttons.print.min.js"></script>
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
    "dom": 'Bfrtip',
    "buttons": [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
  });
</script>
</body>
</html>