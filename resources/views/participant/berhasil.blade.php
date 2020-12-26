<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event - Forum Open Source Teknik Informatika UMS</title>
    <link href="/assets/plugins/material-icons/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/materialize.css">
    <link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <style>
        .fixed {
            position: fixed;
            z-index: 100;
        }
        .title {
		    font-weight: bold;
	    }
    </style>
</head>

<body>

	
    <!-- Navigation Bar -->
	<nav class="nav-wrper fixed green darken-2" style="top: 0 !important;">
		<div class="container">
            <a href="/" class="brand-logo">
                <img src="/assets/images/logo.png" width="90" style="padding-top: 5px;">
            </a>
            <a href="javascript:void(0)" class="sidenav-trigger" style="font-size:26px;" data-target="mysidenav">
                &#9776;
            </a>
			<ul class="right hide-on-med-and-down">
				<li><a href="/">Beranda</a></li>
				<li><a title="Fosti" href="http://fosti.ums.ac.id/">Fosti</a></li>
				<li><a title="Blog Fosti" href="http://fosti.ums.ac.id/blog">Blog</a></li>
                <li><a title="Source Code" href="http://github.com/fosti">Source Code</a></li>
			</ul>
		</div>
    </nav>
        <!-- Side Bar -->
    <div id="mysidenav" class="sidenav">
        <ul>
            <li><a href="/">Beranda</a></li>
			<li><a title="Fosti" href="http://fosti.ums.ac.id/">Fosti</a></li>
			<li><a title="Blog Fosti" href="http://fosti.ums.ac.id/blog">Blog</a></li>
            <li><a title="Source Code" href="http://github.com/fosti">Source Code</a></li>
        </ul>
    </div>
    <!-- The end of Navigation Bar -->

	<div class="menu">

		<section class="section header" id="background-1">
			<div class="row">
				<div class="col s12 center-align">
					 <h1>Event F<font color="red">OS</font>TI</h1>
					<p class="white-text">Forum Open Source Teknik Informatika To Public</p>
				</div>
			</div>
		</section>

		<section class="section register">
			<div class="container valid">
				<div class="row">
					<div class="col s12 center-align">
						<h4 class="green-text">REGISTRATION COMPLETED</h4>
						<p>Terimakasih telah mendaftar pada event <b>{{$dataParti->event}}</b> detail registrasi anda sebagai berikut :</p>
					</div>
				</div>
				<div class="row">
					<div class="col m4"></div>
					<div class="col m2"><b>EVENT</b></div>
					<div class="col m6">{{$dataParti->event}}</div>
				</div>
				<div class="row">
					<div class="col m4"></div>
					<div class="col m2"><b>NAMA</b></div>
					<div class="col m6">{{$dataParti->nama}}</div>
				</div>
				<div class="row">
					<div class="col m4"></div>
					<div class="col m2"><b>INSTANSI&emsp;</b></div>
					<div class="col m6">{{$dataParti->nim}}</div>
				</div>
				<div class="row">
					<div class="col m4"></div>
					<div class="col m2"><b>EMAIL</b></div>
					<div class="col m6">{{$dataParti->email}}</div>
				</div>
				<div class="row">
					<div class="col m4"></div>
					<div class="col m2"><b>NO HP</b></div>
					<div class="col m6">{{$dataParti->hp}}</div>
				</div>
				<br/><center><h6 class="red-text"><strong>Silahkan cek E-Mail</strong></h5></center>
				<div class="row">
					<div class="col s12 center-align">

					</div>
				</div>
			</div>
		</section>
	</div>

	<section class="container section" id="contact_us">
		<div class="row">
			
		</div>
		<div class="divider"></div>
		<div class="row recent-event">
			<div class="col m12">
				<h4 class="green-text">Recent Events</h4>
			</div>
			<div class="row">
				@foreach ($recents as $recent)
					<div class="col l4">
						<div class="card">
							<div class="card-image">
								@if ($recent->pamflet != null)
                                    <img style="height:400px;" src="/images/pamflet/{{ $recent->pamflet }}" alt="">
                                @else
                                    <img src="/assets/images/pamflet.png" alt="">
                                @endif	
							</div>
							<div class="card-content" style="height:250px;">
								<li class="card-title">{{ $recent->nama_event }}<span class="new green badge" data-badge-caption="{{date('d'.' '.'M'.' '.'Y', strtotime($recent->waktu))}}"></span></li>
								<p><b>{{ $recent->nama_event }}</b> - {!! str_limit($recent->deskripsi, 180) !!}</p>
							</div>
							<div class="card-action">
								<a href="/{{ $recent->slug }}" class="btn green darken-2">JOIN</a>
								<a class="waves-effect waves-light btn blue modal-trigger" href="#modaldata-{{ $recent->id }}">Information</a>
                            </div>
                        </div>
					</div>
                    <div id="modaldata-{{ $recent->id }}" class="modal bottom-sheet">
                        <div class="modal-content">
                            <h3 class="header">{{ $recent->nama_event }}</h3>
                            <ul class="collection">
                                <li class="collection-item avatar">
									@if ($recent->pamflet != null)
										<img src="/images/pamflet/{{ $recent->pamflet }}" alt="" class="circle">
									@else
										<img src="/assets/images/pamflet.png" alt="" class="circle">
									@endif
                                    <span class="title">Title</span>
                                    <p>{{ $recent->nama_event }}
                                    </p>
                                </li>
                                <li class="collection-item avatar">
                                    <i class="material-icons circle green">access_time</i>
                                    <span class="title">Time</span>
                                    <p>{{date('l'.', '.'d'.' '.'F'.' '.'Y', strtotime($recent->waktu))}} - {{ date('H:i', strtotime($recent->waktu))}}
                                    </p>
                                </li>
                                <li class="collection-item avatar">
                                    <i class="material-icons circle red">location_on</i>
                                    <span class="title">Location</span>
                                    <p>{{ $recent->tempat }}
                                    </p>
                                </li>
                                <li class="collection-item avatar">
                                    <i class="material-icons circle red">description</i>
                                    <span class="title">Description</span>
                                    <p>{{ $recent->deskripsi }}
                                    </p>
                                </li>
                                <li class="collection-item avatar">
                                    <i class="material-icons circle red">attach_money</i>
                                    <span class="title">Ticket Price</span>
                                    <p>
                                        @if (empty($recent->htm))
                                            Free
                                        @else
                                            {{$recent->htm}}
                                        @endif
                                    </p>
                                </li>
                                <li class="collection-item avatar">
                                    <i class="material-icons circle red">account_circle</i>
                                    <span class="title">Contact</span>
                                    <p>{{ $recent->cp }}
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:void(0)" class="modal-action modal-close btn green darken-2">Okay</a>
                          </div>
                    </div>
					@endforeach
				</div>
		</div>
		</div>
	</section>
</div>



<footer class="page-footer green lighten-1 ">
	
	<div class="footer-copyright green darken-3">
		<div class="container center-align">
			Copyright © 2019  |<a href="http://fosti.ums.ac.id"> FOSTI </a>|  All rights reserved.
		</div>
	</div>
</footer>
	<script type="text/javascript" src="<?php $baseurl; ?>/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php $baseurl; ?>/assets/js/materialize.js"></script>
	<script type="text/javascript" src="/assets/js/participant.js"></script>
    <script type="text/javascript">
        (function ($) {
            $(function () {
                
                //initialize all modals           
                $('.modal').modal();
                
                //now you can open modal from code
                // $('#modal3').modal('open');
                
                //or by click on trigger
                $('.trigger-modal').modal();
                
            }); // end of document ready
        })(jQuery); // end of jQuery name space
    </script>
</body>
</html>