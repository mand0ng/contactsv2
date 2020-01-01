<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    @if (session('error'))
        <div class="alert alert-success">
            {{ session('error') }}
        </div>
    @endif
    <form method="POST" action='/login'>
        @csrf
        E-mail:<br>
        <input type="text" name="email" placeholder="EMAIL">
        <br>
        Password:<br>
        <input type="password" name="password" placeholder="password">
        <br><br>
        <input type="submit" value="Submit"><br><br>
        <a href="{{route('show.user.reg.form')}}">Sign Up!</a>
    </form>
</body>
</html>