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
    <title>Open Recuirement FOSTI UMS</title>
</head>

<body>
    <div class="data">
        <strong style="padding-left:2em">Registrasi anda telah berhasil, dengan data: </strong>
        <br>
        <br>
        <span><strong>Nama: &nbsp; </strong>{{$dataParti->nama}}</span>
        <span><strong>E-Mail: &nbsp; </strong>{{$dataParti->email}}</span>
        <span><strong>HP: &nbsp; </strong>{{$dataParti->hp}}</span>
        <span><strong>Acara: &nbsp; </strong>{{$dataParti->event}}</span>
        <br>
        <strong>Silahkan tunjukan pesan ini di lokasi <u>{{$dataParti->event}}</u></strong>
        <br>
        {{-- <!--<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($qrstring))!!} ">--> --}}
        <img src="{!!$message->embedData(QrCode::format('png')->size(200)->generate($qrstring), 'QrCode.png', 'image/png')!!}">
    </div>
</body>

</html>