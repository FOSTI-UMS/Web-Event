<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <img src="/images/pamflet/{{ $data->pamflet }}" alt="">

    Nama Event: {{ $data->nama_event }} <br>
    Max: {{ $data->max_partic }} <br>
    Waktu: {{date('d'.'/'.'M'.'/'.'Y', strtotime($data->waktu))}} at {{ date('g:ia', strtotime($data->waktu))}} <br>
    Deskripsi: {{ $data->deskripsi }} <br>
    
</body>
</html>