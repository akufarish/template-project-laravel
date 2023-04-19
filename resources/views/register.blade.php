<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
    <h1>Halaman register</h1>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <form action="/register" method="POST">
        @csrf
        <input type="text" name="name" id="name">
        <br>
        <input type="password" name="password" id="password">
        <br>
        <button type="submit">Register</button>
        <a href="/login">sudah punya akun?</a>
    </form>
</body>
</html>