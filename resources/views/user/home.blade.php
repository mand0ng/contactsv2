<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <form action="" method='POST'>
    @CSRF
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" placeholder='name'>
        <br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" placeholder='email@email.com'>
        <br><br>

        <label for="phone_number">Phone No:</label><br>
        <input type="number" name='phone_number' id='phone_number' placeholder='123456789'>
        <br><br>

        <input type="submit" name="submit" id="submit" value='Save'>
    </form>
</body>
</html>