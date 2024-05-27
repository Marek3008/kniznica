<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/register-reader" method="POST">
        @csrf
        <label for="meno">Meno:</label>
        <input type="text" name="meno">
        <label for="priezvisko">Priezvisko:</label>
        <input type="text" name="priezvisko">
        <label for="telefonne_cislo">Telefónne číslo:</label>
        <input type="text" name="telefonne_cislo">
        <label for="datum_narodenia">Dátum narodenia:</label>
        <input type="date" name="datum_narodenia">
        <label for="adresa">Adresa:</label>
        <input type="text" name="adresa">
        <input type="submit" value="Pridaj">
    </form>
</body>
</html>