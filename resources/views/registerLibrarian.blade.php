@extends('layouts.app')

@section('title', 'Pridať knihovníka')

@section('content')
<form action="/register/librarian" method="POST">
    @csrf
    <label for="name">Meno:</label>
    <input type="text" name="name" required>
    <label for="surname">Priezvisko:</label>
    <input type="text" name="surname" required>
    <label for="email">E-mail:</label>
    <input type="email" name="email" required>
    <label for="password">Heslo:</label>
    <input type="password" name="password" required>
    <input type="submit" value="Pridaj">
</form>
@endsection