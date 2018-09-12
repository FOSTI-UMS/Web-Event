<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>pendaftaran event</h1>
    <hr>
    <form action="/event/{{ $reg->slug }}" method="post">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id=""> <br>
            <label for="email">Email</label>
            <input type="text" name="email" id=""> <br>
            <label for="hp">hp</label>
            <input type="text" name="hp" id=""> <br>
            <label for="asal">Asal</label>
            <input type="text" name="asal" id=""> <br>
            <label for="acara">Acara</label>
            <input type="text" name="acara" value="{{ $reg->nama_event }}" disabled id=""> <br>
            <input type="submit" value="daftar">
            @csrf
    </form>

</body>
</html>