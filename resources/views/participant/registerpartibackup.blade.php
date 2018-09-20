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
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    <br /> 
    @endif
    @if (session()->has('sudahdaftar'))
    <div class="alert alert-danger" role="alert">
      {{ session()->get('sudahdaftar') }}
    </div>
    @endif
    <form action="/{{ $reg->slug }}/{{ $reg->id }}/done" method="post">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id=""> <br>
            <label for="email">Email</label>
            <input type="email" name="email" id=""> <br>
            <label for="hp">hp</label>
            <input type="text" name="hp" id=""> <br>
            <label for="acara">Acara</label>
            <input type="text" name="acara" value="{{ $reg->nama_event }}" readonly id=""> <br>
              {!! NoCaptcha::renderJs() !!}
              {!! NoCaptcha::display() !!}
            <input type="submit" value="daftar">
            @csrf
    </form>

</body>
</html>