<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Event - Forum Open Source Teknik Informatika UMS</title>
	<link href="<?php $baseurl; ?>/assets/iconfont/material-icons.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php $baseurl; ?>/assets/css/materialize.css">
	<link rel="stylesheet" type="text/css" href="<?php $baseurl; ?>/assets/css/main.css">
	<script type="text/javascript" src="<?php $baseurl; ?>/assets/js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="<?php $baseurl; ?>/assets/js/materialize.js"></script>
	<style>
	.fixed {
		position: fixed;
		z-index: 100;
	}
	</style>
	<script>
			$(document).ready(function(){
				$(".preloader").fadeOut();
			});
		</script>

</head>

<body>

	
	<!-- Navigation Bar -->
	<nav class="nav-wrper fixed green darken-2">
		<div class="container">
			<a href="#" class="brand-logo" style="font-size: 25px; width: bold;">
				<img src="/assets/images/logo.png" class="">
			</a>
			<a href="#" class="sidenav-trigger" data-target="mobile-links">
				<i class="material-icons">menu</i>
			</a>
			<ul class="right hide-on-med-and-down">
				<li><a href="./">Beranda</a></li>
				<li><a href="https://fosti.ums.ac.id/blog">Blog</a></li>
				<li><a href="./License.html">License</a></li>
				<li><a href="./term-of-service.html">Term of Service</a></li>
				<li><a href="./privacy-policy.html"> Privacy Policy</a></li>
				<li><a href="./contact-us.html"> Contact Us</a></li>
			</ul>
		</div>
	</nav>
	<ul class="sidenav" id="mobile-links">
		<li><a href="./">Beranda</a></li>
		<li><a href="https://fosti.ums.ac.id/blog">Blog</a></li>
		<li><a href="./License.html">License</a></li>
		<li><a href="./term-of-service.html">Term of Service</a></li>
		<li><a href="./privacy-policy.html"> Privacy Policy</a></li>
		<li><a href="./contact-us.html"> Contact Us</a></li>
	</ul>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.sidenav').sidenav();
		})
		function beranda() {
			alert('a');
			
		}
	</script>
	<!-- The end of Navigation Bar -->

	<div class="menu">

		<section class="section header" id="background-1">
			<div class="row">
				<div class="col s12 center-align">
					 <h1>Event F<font color="red">OS</font>TI</h1>
					<p class="white-text">Froum Open Source Teknik Informatika To Public</p>
				</div>
			</div>
		</section>

		<section class="section register">
			<div class="container valid">
				<div class="row">
					<div class="col s12 center-align">
						<h4 class="green-text">REGISTRATION COMPLETED</h4>
						<p>Terimakasih telah mendaftar pada event <b>{{$dataParti->event}}</b> detali registrasi anda sebagai berikut :</p>
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
					<div class="col m2"><b>EMAIL</b></div>
					<div class="col m6">{{$dataParti->email}}</div>
				</div>
				<div class="row">
					<div class="col m4"></div>
					<div class="col m2"><b>NO HP</b></div>
					<div class="col m6">{{$dataParti->hp}}</div>
				</div>
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
								<img src="<?php $baseurl; ?>/images/pamflet/{{ $recent->pamflet }}" alt="">	
							</div>
							<div class="card-content">
								<li class="card-title">{{ $recent->nama_event }}<span class="new green badge" data-badge-caption="{{date('d'.' '.'M'.' '.'Y', strtotime($recent->waktu))}}"></span></li>
								<p><b>{{ $recent->nama_event }}</b> - {!! str_limit($recent->deskripsi, 180) !!}</p>
							</div>
							<div class="card-action">
								<a href="/{{ $recent->slug }}/{{ $recent->id }}" class="btn green darken-2">JOIN</a>
								<a href="youtube-downloader" class="btn blue">INFORMASI</a>	
							</div>
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
			&copy; 2018 Event Fosti 
		</div>
	</div>
</footer>


</body>
</html>