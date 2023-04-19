<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <h1>Halaman register</h1>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
                <p>{{ $error }}</p>
              </div>
        @endforeach
    @endif
    @if (Session::has("message"))
    <div class="alert alert-success" role="alert">
        <p>{{ Session::get('message') }}</p>
      </div>
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
