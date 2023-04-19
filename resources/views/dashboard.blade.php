<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
    <h1>Selamat datang {{ Auth::user()->name }}</h1>
    <a href="/tambah">Tambah murid</a>
        <p>{{ Session::flash("sukses") }}</p>
    <ul>
        @php
            $i = 1
        @endphp
        @foreach ($murid as $murid)
            <li>{{ $i++ }}.{{ $murid->nama }} | <a href="/ubah/{{ $murid->id }}">Ubah data</a> <a href="/hapus/{{ $murid->id }}">Hapus data</a></li>
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