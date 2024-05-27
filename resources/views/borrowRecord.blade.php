<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/borrow-record" method="POST">
        @csrf
        <label for="kniha">Kniha: </label>
        <select name="kniha" id="">
            @foreach ($books as $book)
                <option value="{{ $book->isbn }}">{{ $book->autor }}: {{ $book->nazov }} - {{ $book->rok_vydania }}</option>
            @endforeach
        </select>
        <label for="citatel_id">Čitateľ:</label>
        <select name="citatel_id" id="">
            @foreach ($readers as $reader)
                <option value="{{ $reader->id }}">{{ $reader->id }} - {{ $reader->meno }} {{ $reader->priezvisko }}</option>
            @endforeach
        </select>
        <input type="submit" value="Potvrdiť">
    </form>
</body>
</html>