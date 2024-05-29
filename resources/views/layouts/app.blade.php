<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Miestna knižnica | @yield('title')</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <h1>MIESTNA KNIŽNICA</h1>
            <ul class="navbar-list">
                @auth
                    <li class="navbar-list--item"><a href="/borrow-records">Výpožičky</a></li>
                    <li class="navbar-list--item"><a href="/register/book">Pridaj knihu</a></li>
                    <li class="navbar-list--item"><a href="/register/reader">Registruj čitateľa</a></li>
                    <li class="navbar-list--item"><a href="/register/librarian">Registruj knihovníka</a></li>
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
        @auth
            <h2>Prihlásený ako: {{ auth()->user()->name }}</h2>
        @endauth
        @yield('content')
    </main>
    <footer>
        &copy; CrazyBanas3008
    </footer>
</body>
</html>