<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
    <h1>Halaman login</h1>
    <form action="/login" method="POST">
        @csrf
        <input type="text" name="name" id="name">
        <br>
        <input type="password" name="password" id="password">
        <br>
        <button type="submit">Login</button>
        <a href="/register">Belum punya akun?</a>
    </form>
</body>
</html>