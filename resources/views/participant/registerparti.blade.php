<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon-->
	<link rel="icon" href="/assets/favicon.png" type="image/x-icon">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Event - Forum Open Source Teknik Informatika UMS</title>
	<link href="<?php $baseurl; ?>/assets/plugins/material-icons/material-icons.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php $baseurl; ?>/assets/css/materialize.css">
	<link rel="stylesheet" type="text/css" href="<?php $baseurl; ?>/assets/css/main.css">
	{{-- <!-- Theme style -->
  <link rel="stylesheet" href="/assets/css/admin.css"> --}}
	<!-- Waves Effect Css -->
	<link href="/assets/css/waves.css" rel="stylesheet" />
	<!-- CSS sweetalert -->
	<link rel='stylesheet' href='/assets/plugins/sweetalert2/sweetalert2.min.css'>
	<style>
		.fixed {
			position: fixed;
			z-index: 100;
		}

		label.error {
			font-size: 12px;
			display: block;
			margin-top: 5px;
			font-weight: normal;
			color: #F44336 !important;
			text-transform: none;
			line-height: normal;
			position: absolute;
			top: 33px;
		}

		.error.active {
			-webkit-transform: translateY(12px) scale(1) !important;
			transform: translateY(12px) scale(1) !important;
			-webkit-transform-origin: 0 0;
			transform-origin: 0 0;
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
					<p class="white-text">Forum Open Source Teknik Informatika</p>
				</div>
			</div>
		</section>

		<section class="section register">
			<div class="container">
				<div class="row">
					<div class="col s12 center-align">
						<h4 class="green-text">PENDAFTARAN {{ $reg->nama_event }}</h4>
					</div>
				</div>

			</div>

		</section>
	</div>

	<section class="container section" id="contact_us">


		<div class="row">
			<div class="col l3">
				<br>
				@if ($reg->pamflet != null)
				<img src="/images/pamflet/{{ $reg->pamflet }}" alt="" class="responsive-img">
				@else
				<img src="/assets/images/pamflet.png" alt="" class="responsive-img">
				@endif
			</div>
			<div class="col l4 12">
				<h4 class="green-text">{{ $reg->nama_event }}</h4>
				<p>{{ $reg->deskripsi }}
				</p>
			</div>
			<div class="col l5 m12 full">
				<form action="/{{ $reg->slug }}/done" method="post" id="validasi">
					@csrf
					<div class="input-field">
						<input type="text" name="nama" id="nama" required autofocus>
						<label for="nama">Nama Kamu</label>
					</div>
					<div class="input-field">
						<input type="text" name="nim" id="nim" required>
						<label for="nim">Instansi Kamu (Umum/Universitas/Sekolah)</label>
					</div>
					<div class="input-field">
						<input type="email" name="email" id="email" required>
						<label for="email">Email Kamu</label>
					</div>
					<div class="input-field">
						<input type="text" name="hp" id="hp" required>
						<label for="hp">Telepon Kamu</label>
					</div>
					<div class="input-field">
						<input type="text" name="acara" id="acara" value="{{ $reg->nama_event }}" readonly>
						<!-- <input type="hidden" id="event" name="event" value=""> -->
					</div>
					<div class="input-field" required>
						{!! NoCaptcha::renderJs() !!}
						{!! NoCaptcha::display() !!}
					</div>

					<div class="input-field">
						<input type="submit" name="send" value="DAFTAR EVENT" class="btn green darken-3">
					</div>
				</form>
			</div>
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
								<p>{{date('l'.', '.'d'.' '.'F'.' '.'Y', strtotime($recent->waktu))}} - {{ date('g:i', strtotime($recent->waktu))}}
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
				Copyright © 2019 |<a href="http://fosti.ums.ac.id"> FOSTI </a>| All rights reserved.
			</div>
		</div>
	</footer>
	<!-- Sweetalert Js -->
	<script src="/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
	@include('sweet::alert')
	<script type="text/javascript" src="<?php $baseurl; ?>/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php $baseurl; ?>/assets/js/materialize.js"></script>
	<script type="text/javascript" src="/assets/js/participant.js"></script>
	<!-- Validation Plugin Js -->
	<script src="/assets/js/jquery.validate.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#validasi").validate();
		});
	</script>
	@if ($errors->has('g-recaptcha-response'))
	<script type='text/javascript'>
		function gagal() {
			swal({
				title: 'Harap Centang reCaptcha!',
				type: 'error',
				confirmButtonText: 'OK',
				confirmButtonColor: '#4caf50',
				reverseButtons: true,
				focusConfirm: true,
			});
		}
	</script>
	<div></div>
	<script>
		gagal();
	</script>
	@endif
	<script type="text/javascript">
		(function($) {
			$(function() {

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