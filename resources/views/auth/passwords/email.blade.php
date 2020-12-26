<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Reset Password | WEB EVENT FOSTI UMS</title>
   <!-- Favicon-->
    <link rel="icon" href="/assets/favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="/assets/css/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="/assets/css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/all-themes.css" rel="stylesheet" />

    <!-- CSS sweetalert -->
    <link rel='stylesheet' href='/assets/plugins/sweetalert2/sweetalert2.min.css'>

    <!-- Material Icon CSS -->
    <link type="text/css" rel="stylesheet" href="/assets/plugins/material-icons/material-icons.css">

</head>
<body class="login-page">
    <div id="mysidenav" class="sidenav">
        <div class="tutup">
            <a href="javascript:void(0)" onclick="tutupnav()">&times;</a>
        </div>
          <ul>
            <li><a href="http://fosti.ums.ac.id" title="Homepage" >Beranda</a></li>
                <li><a title="Blog Fosti" href="http://fosti.ums.ac.id/blog">Blog</a></li>
                <li><a title="Event Fosti" href="http://event.fostiums.org/">Event</a></li>
                <li><a title="Source Code" href="http://github.com/fosti">Source Code</a></li>
          </ul>
        </div>
        <div id="overlay" onclick="tutupnav()"></div>
        <div style="display: none" class="mobile">
            <span style="font-size:26px;cursor:pointer; padding-left: 3%;" onclick="tampilnav()">&#9776;</span>  
        </div>  
    <menu>
        <ul>
                <li><a href="http://fosti.ums.ac.id" title="Homepage" ><i class="material-icons" style="font-size: 15px;">home</i> Beranda</a></li>
                <li><a title="Blog Fosti" href="http://fosti.ums.ac.id/blog">Blog</a></li>
                <li><a title="Event Fosti" href="http://event.fostiums.org/">Event</a></li>
                <li><a title="Source Code" href="http://github.com/fosti">Source Code</a></li>
        </ul>
    </menu>
    <div class="login-box">
        <div class="logo">
            <a title="Homepage" href="http://fosti.ums.ac.id/"><b>F<b style="color:red;">OS</b>TI UMS</b></a>
            <small>RESET PASSWORD ADMIN FOSTI</small>
        </div>
        <div style="border-radius: 15px 15px 0 0 !important; }" class="card">
            <div class="body">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <form id="sign_in" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="msg"><strong>Silahkan masukkan e-mail untuk reset password</strong></div>
                        <div class="input-group">
                            <div class="form-line">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="col-md-6" style="width: 190px;padding: 0;margin: auto; float: none;">
                                <button type="submit" class="tombol waves-effect" style="margin: 0;">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <footer class="loginfooter"><p>Copyright © 2019 | <a href="http://fosti.ums.ac.id/" title="Homepage">FOSTI </a> | All Rights Reserved.</p></footer>
   <!-- Jquery Core Js -->
    <script src="/assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="/assets/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="/assets/js/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="/assets/js/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="/assets/js/admin.js"></script>
    <script src="/assets/js/sign-in.js"></script>
    <script src="/assets/js/main.js"></script>

    <!-- Sweetalert Js -->
    <script src="/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    @if ($errors->has('email'))
        <script type='text/javascript'>
            function gagal() {
                swal({
                    title: 'Email Tidak Terdaftar!',
                    type: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#4caf50',
                    reverseButtons: true,
                    focusConfirm: true,
                 });
            }
        </script>
        <div></div>
        <script>gagal();</script>
    @endif
</body>
</html>
