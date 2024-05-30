@extends('layouts.app')

@section('title', 'Pridať knihu')

@section('content')
<form action="/register/book" method="POST">
    @csrf
    <label for="isbn">ISBN:</label>
    <input type="number" name="isbn" min="1000000000000" max="9999999999999" required>
    <label for="nazov">Názov:</label>
    <input type="text" name="nazov" required>
    <label for="autor">Autor:</label>
    <input type="text" name="autor" required>
    <label for="rok_vydania">Rok vydania:</label>
    <input type="number" name="rok_vydania" min="0" max="2024" required>
    <label for="zaner">Žáner:</label>
    <input type="text" name="zaner" required>
    <input type="submit" value="Pridaj">
</form>
@endsection