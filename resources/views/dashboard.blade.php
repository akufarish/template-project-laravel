<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>{{ $title }}</title>
</head>
<body>
    <h1>Selamat datang {{ Auth::user()->name }}</h1>
    <a href="/tambah">Tambah murid</a>

    @if (Session::has("message"))
    <div class="alert alert-success" role="alert">
        <p>{{ Session::get("message") }}</p>
      </div>
    @endif

    <ul>
        @php
            $i = 1
        @endphp
        @foreach ($murid as $murid)
            <li>{{ $i++ }}.
                <br>
                <img width="80" src="{{ asset("storage/". $murid->gambar) }}" alt="">
                {{ $murid->nama }} | <a href="/ubah/{{ $murid->id }}">Ubah data</a> <a href="/hapus/{{ $murid->id }}">Hapus data</a></li>
        @endforeach
    </ul>

    <form action="/logout" method="POST">
        @csrf
        <br>
        <br>
        <button type="submit">Logout</button>
    </form>
</body>
</html>
