<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <h1>MIESTNA KNIŽNICA</h1>
            <ul class="navbar-list">
                @auth
                    <li class="navbar-list--item"><a href="/borrow-record">Urobiť výpožičku</a></li>    
                @endauth

                <li class="navbar-list--item"><a href="/login">Prihlásiť sa</a></li>

                @auth
                    <li class="navbar-list--item"><a href="/logout">Odhlásiť sa</a></li>    
                @endauth
            </ul>
        </nav>
    </header>
    <form action="/register/book" method="POST">
        @csrf
        <label for="isbn">ISBN:</label>
        <input type="number" name="isbn">
        <label for="nazov">Názov:</label>
        <input type="text" name="nazov">
        <label for="autor">Autor:</label>
        <input type="text" name="autor">
        <label for="rok_vydania">Rok vydania:</label>
        <input type="number" name="rok_vydania" min="0" max="2024">
        <label for="zaner">Žáner:</label>
        <input type="text" name="zaner">
        <input type="submit" value="Pridaj">
    </form>
</body>
</html>