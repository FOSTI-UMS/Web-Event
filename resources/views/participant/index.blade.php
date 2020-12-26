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
                        <h4 class="green-text">OUR EVENTS</h4>
                    </div>
                </div>
                <div class="row">
                    @foreach ($events as $event)
                    <div class="col l4">
                        <div class="card">
                            <div class="card-image">
                                @if ($event->pamflet != null)
                                    <img style="height:500px;" src="/images/pamflet/{{ $event->pamflet }}" alt="">
                                @else
                                    <img src="/assets/images/pamflet.png" alt="">
                                @endif
                            </div>
                            <div class="card-content" style="height:200px;">
                                <li class="card-title"><span style="font-weight:700;">{{ $event->nama_event }}</span><span class="new green badge" data-badge-caption="{{date('d'.' '.'M'.' '.'Y', strtotime($event->waktu))}}"></span></li>
                                <p>{!! str_limit($event->deskripsi, 180) !!}</p>
                            </div>
                            <div class="card-action">
                                <a href="/{{ $event->slug }}" class="btn green darken-2">JOIN</a>
                                <a class="waves-effect waves-light btn blue modal-trigger" href="#modaldata-{{ $event->id }}">Information</a>
                            </div>
                        </div>
                    </div>
                    <div id="modaldata-{{ $event->id }}" class="modal bottom-sheet">
                        <div class="modal-content">
                            <h3 class="header">{{ $event->nama_event }}</h3>
                            <ul class="collection">
                                <li class="collection-item avatar">
                                    @if ($event->pamflet != null)
										<img src="/images/pamflet/{{ $event->pamflet }}" alt="" class="circle">
									@else
										<img src="/assets/images/pamflet.png" alt="" class="circle">
									@endif	
                                    <span class="title">Title</span>
                                    <p>{{ $event->nama_event }}
                                    </p>
                                </li>
                                <li class="collection-item avatar">
                                    <i class="material-icons circle green">access_time</i>
                                    <span class="title">Time</span>
                                    <p>{{date('l'.', '.'d'.' '.'F'.' '.'Y', strtotime($event->waktu))}} - {{ date('H:i', strtotime($event->waktu))}}
                                    </p>
                                </li>
                                <li class="collection-item avatar">
                                    <i class="material-icons circle red">location_on</i>
                                    <span class="title">Location</span>
                                    <p>{{ $event->tempat }}
                                    </p>
                                </li>
                                <li class="collection-item avatar">
                                    <i class="material-icons circle red">description</i>
                                    <span class="title">Description</span>
                                    <p>{{ $event->deskripsi }}
                                    </p>
                                </li>
                                <li class="collection-item avatar">
                                    <i class="material-icons circle red">attach_money</i>
                                    <span class="title">Ticket Price</span>
                                    <p>
                                        @if (empty($event->htm))
                                            Free
                                        @else
                                            {{$event->htm}}
                                        @endif
                                    </p>
                                </li>
                                <li class="collection-item avatar">
                                    <i class="material-icons circle red">account_circle</i>
                                    <span class="title">Contact</span>
                                    <p>{{ $event->cp }}
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
            {{ $events->links('vendor.pagination.materializecss') }}
        </section>
    </div>

    {{-- <section class="container section" id="contact_us">
        <div class="row">
            <div class="col m6 12">
                <h4 class="green-text">CONTACT US</h4>
                <p>Hubungi kami melalui form ini jika menemukan kesulitan atau error saat melakukan pendaftaran di website
                    ini. kami akan membantu anda dengan cepat</p>
                <p>Kami akan segera membaca, membalas dan melakukan request yang anda kirim ke kami dengan segera.</p>
            </div>
            <div class="col m6 12">
                <form action="">
                    @csrf
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
    </section> --}}
    </div>

    <footer class="page-footer green lighten-1 ">
        <div class="footer-copyright green darken-3">
            <div class="container center-align">
                Copyright © 2019  |<a href="http://fosti.ums.ac.id"> FOSTI </a>|  All rights reserved.
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/materialize.js"></script>
    <script type="text/javascript" src="/assets/js/participant.js"></script>
</body>
</html>