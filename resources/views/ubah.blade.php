<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
    <h1>Udate data</h1>
    <a href="/dashboard">kembali</a>
    <br>
    <br>
    <form action="/ubah" method="POST" enctype="multipart/form-data">
        @csrf
        @foreach ($murid as $murid)
            <input type="hidden" name="id" value="{{ $murid->id }}">
            <input type="hidden" name="oldImage" value="{{ $murid->gambar }}">
            <input type="file" name="gambar" id="gambar">
            <br>
            <input type="text" name="nama" id="nama" value="{{ $murid->nama }}">
            <br>
            <br>
            <input type="text" name="kelas" id="kelas" value="{{ $murid->kelas }}">
            <br>
            <br>
            <input type="text" name="jurusan" id="jurusan" value="{{ $murid->jurusan }}">
            <br>
            <br>
            <button type="submit">Update data</button>
        @endforeach
    </form>
</body>
</html>