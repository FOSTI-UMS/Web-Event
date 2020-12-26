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

            .berhasil
            {
                background-color: green;
                padding: 10px;
                color: white;
                border-radius: 10px;
                text-align: center;
            }
            .konfirmasi
            {
                background-color: rgb(57, 57, 58);
                padding: 10px;
                color: white;
                font-size: 16pt;
                font-weight: bold;
                border-radius: 5px;
                border:0;
                text-align: center;
                margin-top: 30px;
                margin-bottom: 30px;
                text-decoration: none;
            }
            .konfirmasi a
            {
                background-color: rgb(57, 57, 58);
                padding: 10px;
                color: white;
                font-size: 16pt;
                font-weight: bold;
                border-radius: 5px;
                border:0;
                text-align: center;
                margin-top: 30px;
                margin-bottom: 30px;
                text-decoration: none;
            }
            .konfirmasi:hover
            {
                background-color: rgb(101, 101, 103);
                padding: 10px;
                color: white;
                font-size: 16pt;
                font-weight: bold;
                border-radius: 5px;
                border:0;
                text-align: center;
                margin-top: 30px;
                margin-bottom: 30px;
                cursor: pointer;
            }
        </style>
    <title>{{$dataParti['event']}}</title>
</head>
<body>
    <div class="data">
        <div class="berhasil">REGISTRASI BERHASIL</div>
        <hr>
        <center>
        <img src="{!!$message->embedData(QrCode::format('png')->merge('/public/images/favicon.png')->size(250)->generate($qrstring), 'QrCode.png', 'image/png')!!}">
        </center>
        <br>
        Berikut data anda:
        <br>
        <table border="0">
            <tr>
                <td width="40%">Nama</td>
                <td>: {{$dataParti['nama']}}</td>
            </tr>
            <tr>
                <td>Instansi</td>
                <td>: {{$dataParti['nim']}}</td>
            </tr>
            <tr>
                <td>E-Mail</td>
                <td>: {{$dataParti['email']}}</td>
            </tr>
            <tr>
                <td>No Handphone</td>
                <td>: {{$dataParti['hp']}}</td>
            </tr>
            <tr>
                <td>Acara</td>
                <td>: {{$dataParti['event']}}</td>
            </tr>

        </table>

        <hr>"
        <strong>SILAHKAN SIMPAN DAN TUNJUKKAN PESAN INI KE PANITIA DI LOKASI ACARA <u>{{$dataParti['event']}}</u> </strong>
        <br>
        <br>
        <p align="center"><b>KLIK KONFIRMASI DIBAWAH INI UNTUK VERIFIKASI KEIKUTSERTAAN SEHINGGA DATA ANDA AKAN DISIMPAN DALAM DATA PESERTA<b></p>
        
        <center>
            <a href="{{ route('konfirmasi',['email'=>$dataParti['email'],'event'=>$dataParti['event']]) }}" class="konfirmasi">KONFIRMASI</a> 
        </center>
<br><br>
        <hr>

                
        {{-- <form action="{{route('konfirmasi')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="nama" value="{{$dataParti['nama']}}">
            <input type="hidden" name="instansi" value="{{$dataParti['nim']}}">
            <input type="hidden" name="email" value="{{$dataParti['email']}}">
            <input type="hidden" name="hp" value="{{$dataParti['hp']}}">
            <input type="hidden" name="acara" value="{{$dataParti['event']}}">
            <center>
                <button type="submit" name="konfirmasi" class="konfirmasi">KONFIRMASI</button>
            </center>
        </form> --}}
    </div>
    <center>
        <small>
            <strong style="text-align:center;">Copyright © 2019  |<a href="{{route('konfirmasi')}}"> FOSTI </a>|  All rights reserved. </strong>
        </small>
    </center>


</body>
</html>