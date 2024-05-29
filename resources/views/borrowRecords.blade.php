<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="ongoing-records">
    <h1>Práve vypožičané</h1>
    @foreach ($ongoingRecords as $record)
        <div class="borrow-record" @style(["background-color: #ff6b6b;" => $record->fine])>
            <div class="borrow-record--info">
                <p>{{ $record->reader->meno }} {{ $record->reader->priezvisko }}: {{ $record->book->nazov }}</p>
                <p>Dátum požičania: {{ $record->datum_vypozicky }}</p>
                <p>Odhadovaný dátum vrátenia: {{ $record->odhadovany_datum_vratenia }}</p>
                @if ($record->fine)
                    <p>Sankcia: {{ $record->fine->ciastka }}€</p>
                @endif
            </div>
            <div class="operation-buttons">
                <a href="/close-record-{{ $record->id }}">Uzavri</a>
                @if (!$record->fine)
                    <a href="/create-fine-{{ $record->id }}">Uložiť pokutu</a>
                @endif
            </div>
        </div>
    @endforeach
    </div>
    <div class="archived-records">
        <h1>Archivované</h1>
        @foreach ($archivedRecords as $record)
            <div class="borrow-record">
                <div class="borrow-record--info">
                    <p>{{ $record->reader->meno }} {{ $record->reader->priezvisko }}: {{ $record->book->nazov }}</p>
                    <p>Dátum požičania: {{ $record->datum_vypozicky }}</p>
                    <p>Odhadovaný dátum vrátenia: {{ $record->odhadovany_datum_vratenia }}</p>
                    <p>Dátum vrátenia: {{ $record->datum_vratenia }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <a href="/borrow-records/create">Urobiť Výpožičku</a>
</body>
</html>