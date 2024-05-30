@extends('layouts.app')

@section('title', 'Výpožičky')

@section('content')
<div style="display: flex; position: relative; gap: 100px;">
<div class="ongoing-records records">
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
            <a href="/borrow-records/close/{{ $record->id }}">Uzavri</a>
            @if (!$record->fine)
                <a href="/create-fine-{{ $record->id }}">Uložiť pokutu</a>
            @endif
        </div>
    </div>
    @endforeach
</div>
<div class="archived-records records">
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
</div>
<br>
<a style="position: absolute; bottom: 130px;" href="/borrow-records/create">Urobiť Výpožičku</a>    
@endsection
