<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Domov</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <h1>MIESTNA KNIŽNICA</h1>
            <ul class="navbar-list">
                @auth
                    <li class="navbar-list--item"><a href="/borrow-records">Výpožičky</a></li>
                    <li class="navbar-list--item"><a href="/register-book">Pridaj knihu</a></li>
                    <li class="navbar-list--item"><a href="/register-reader">Registruj čitateľa</a></li>
                @endauth

                @guest
                <li class="navbar-list--item"><a href="/login">Prihlásiť sa</a></li>
                @endguest

                @auth
                    <li class="navbar-list--item"><a href="/logout">Odhlásiť sa</a></li>    
                @endauth
            </ul>
        </nav>
    </header>
    <main>
        <div class="book-container">
            <h2 class="book-container-heading">Dostupné knihy</h2>
            <div class="book-container-content">
                @foreach ($available as $book)
                    <p>{{ $book->nazov }} - {{ $book->autor }}</p>
                @endforeach
            </div>
        </div>
        <div class="book-container">
            <h2 class="book-container-heading">Vypožičané knihy</h2>
            <div class="book-container-content">
                @foreach ($unavailable as $book)
                    <p>{{ $book->nazov }} - {{ $book->autor }}</p>
                @endforeach
            </div>
        </div>
    </main>
    <footer>
        &copy; CrazyBanas3008
    </footer>
</body>
</html>