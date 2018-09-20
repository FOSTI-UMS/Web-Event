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
	

</head>
<body>
	
	<!-- Navigation Bar -->
	<nav class="nav-wrper fixed green darken-2">
		<div class="container">
			<a href="#" class="brand-logo" style="font-size: 25px; width: bold;">
				<img src="assets/images/logo.png" class="">
			</a>
			<a href="#" class="sidenav-trigger" data-target="mobile-links">
				<i class="material-icons">menu</i>
			</a>
			<ul class="right hide-on-med-and-down">
				<li><a href="./">Beranda</a></li>
				<li><a href="https://fosti.ums.ac.id/blog">Blog</a></li>
				<li><a href="#">License</a></li>
				<li><a href="#">Term of Service</a></li>
				<li><a href="#"> Privacy Policy</a></li>
				<li><a href="#"> Contact Us</a></li>
			</ul>
		</div>
	</nav>
	<ul class="sidenav" id="mobile-links">
		<li><a href="./">Beranda</a></li>
		<li><a href="https://fosti.ums.ac.id/blog">Blog</a></li>
		<li><a href="#">License</a></li>
		<li><a href="#">Term of Service</a></li>
		<li><a href="#"> Privacy Policy</a></li>
		<li><a href="#"> Contact Us</a></li>
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
					<p class="white-text">Froum Open Source Teknik Informatika</p>
				</div>
			</div>
		</section>

		<section class="section register">
			<div class="container">
				<div class="row">
					<div class="col s12 center-align">
						<h4 class="green-text">OUR EVENTS</h4>
					</div>
				</div>
				<div class="row">
					@foreach ($events as $event)
					<div class="col l4">
						<div class="card">
							<div class="card-image">
								<img src="<?php $baseurl; ?>/images/pamflet/{{ $event->pamflet }}" alt="">	
							</div>
							<div class="card-content">
								<li class="card-title">{{ $event->nama_event }}<span class="new green badge" data-badge-caption="{{date('d'.' '.'M'.' '.'Y', strtotime($event->waktu))}}"></span></li>
								<p><b>{{ $event->nama_event }}</b> - {!! str_limit($event->deskripsi, 180) !!}</p>
							</div>
							<div class="card-action">
								<a href="/{{ $event->slug }}/{{ $event->id }}" class="btn green darken-2">JOIN</a>	
								<a href="youtube-downloader" class="btn blue">INFORMASI</a>	
							</div>
						</div>
					</div>
					@endforeach
				</div>
            </div>
            {{ $events->links() }}
		</section>
	</div>

	<section class="container section" id="contact_us">
		<div class="row">
			<div class="col m6 12">
				<h4 class="green-text">CONTACT US</h4>
				<p>Hubungi kami melalui form ini jika menemukan kesulitan atau error saat melakukan pendaftaran di website ini. kami akan membantu anda dengan cepat</p>
				<p>Kami akan segera membaca, membalas dan melakukan request yang anda kirim ke kami dengan segera.</p>
			</div>
			<div class="col m6 12">
				<form action="">
					<div class="input-field">
						<input type="email" id="email">
						<label for="email">Your Email</label>
					</div>
					<div class="input-field">
						<textarea name="" id="meassage" class="materialize-textarea"></textarea>
						<label for="meassage">Your Message</label>
					</div>
					<div class="input-field">
						<input type="submit" name="send" value="KIRIM PESAN" class="btn green darken-3">
					</div>

				</form>
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