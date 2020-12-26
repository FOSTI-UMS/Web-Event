<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
        <style>
            span{
                display: block;
            }
            span>strong{
                padding-left:3em;
            }
        </style>
    <title>{{$dataParti->event}}</title>
</head>

<body>
    <div class="data">
        <strong>Registrasi anda telah berhasil, dengan data: </strong>
        <br>
        <br>
        <span><strong>Nama: &nbsp; </strong>{{$dataParti->nama}}</span>
        <span><strong>Instansi: &nbsp; </strong>{{$dataParti->nim}}</span>
        <span><strong>E-Mail: &nbsp; </strong>{{$dataParti->email}}</span>
        <span><strong>HP: &nbsp; </strong>{{$dataParti->hp}}</span>
        <span><strong>Acara: &nbsp; </strong>{{$dataParti->$var['event']}}</span>
        <br>
        <strong>Silahkan tunjukan pesan ini di lokasi <u>{{$dataParti->event}}</u></strong>
        <br>
        {{-- <!--<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($qrstring))!!} ">--> --}}
        <img src="{!!$message->embedData(QrCode::format('png')->merge('/public/images/favicon.png')->size(250)->generate($qrstring), 'QrCode.png', 'image/png')!!}">
        <form action="{{route('konfirmasi')}}">
            <input type="hidden" name="nama" value="{{$dataParti['nama']}}">
            <input type="hidden" name="instansi" value="{{$dataParti['nim']}}">
            <input type="hidden" name="email" value="{{$dataParti['email']}}">
            <input type="hidden" name="hp" value="{{$dataParti['hp']}}">
            <input type="hidden" name="acara" value="{{$var['event']}}">
            <input type="button" value="konfirmasi">
        </form>
    </div>
    <strong style="text-align:center;">Copyright © 2019  |<a href="http://fosti.ums.ac.id"> FOSTI </a>|  All rights reserved. </strong>
</body>
</html>
