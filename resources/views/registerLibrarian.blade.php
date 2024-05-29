<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/register/librarian" method="POST">
        @csrf
        <label for="name">Meno:</label>
        <input type="text" name="name">
        <label for="surname">Priezvisko:</label>
        <input type="text" name="surname">
        <label for="email">E-mail:</label>
        <input type="email" name="email">
        <label for="password">Heslo:</label>
        <input type="password" name="password">
        <input type="submit" value="Pridaj">
    </form>
</body>
</html>