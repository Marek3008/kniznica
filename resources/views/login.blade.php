<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Login</title>
</head>
<body>
    <form class="login-form" action="" method="POST">
        @csrf
        <div class="form-field">
            <label for="email">E-mail</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-field">
            <label for="password">Heslo</label>
            <input type="password" name="password" required>
        </div>

        <input class="submit" type="submit" value="Prihlásiť sa">
    </form>
</body>
</html>