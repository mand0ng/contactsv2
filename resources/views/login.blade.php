<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form method="POST" action='/login'>
        @csrf
        E-mail:<br>
        <input type="text" name="email" placeholder="EMAIL">
        <br>
        Password:<br>
        <input type="password" name="password" placeholder="password">
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>