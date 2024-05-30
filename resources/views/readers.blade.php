@extends('layouts.app')

@section('title', 'Čitatelia')

@section('content')
<div class="content left-content readers">
    @foreach ($readers as $reader)
        <div class="reader">
            <p><strong>{{ $reader->meno }} {{ $reader->priezvisko }}</strong></p>
            <p>Tel. č.: {{ $reader->telefonne_cislo }}</p>
            <p>Adresa: {{ $reader->adresa }}</p>
            <p>Čitateľské č.: {{ $reader->id }}</p>
        </div>
    @endforeach
</div>
<form action="/register/reader" method="POST">
    @csrf
    <div class="form-input">
        <label for="meno">Meno:</label>
        <input type="text" name="meno" required>
    </div>
    <div class="form-input">
        <label for="priezvisko">Priezvisko:</label>
        <input type="text" name="priezvisko" required>
    </div>
    <div class="form-input">
        <label for="telefonne_cislo">Telefónne číslo:</label>
        <input type="text" name="telefonne_cislo" required>
    </div>
    <div class="form-input">
        <label for="datum_narodenia">Dátum narodenia:</label>
        <input type="date" name="datum_narodenia" required>
    </div>
    <div class="form-input">
        <label for="adresa">Adresa:</label>
        <input type="text" name="adresa" required>
    </div>
    <input class="submit-input" type="submit" value="Pridaj">
</form>
@endsection
