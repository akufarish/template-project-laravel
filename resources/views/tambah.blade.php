<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
    <a href="/dashboard">Kembali</a>
    <h3>Tambah data</h3>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <form action="/tambah" method="POST">
        @csrf
        <input type="text" name="nama" id="nama">
        <br>
        <input type="text" name="kelas" id="kelas">
        <br>
        <input type="text" name="jurusan" id="jurusan">
        <br>
        <button type="submit">Tambah data</button>
    </form>
</body>
</html>