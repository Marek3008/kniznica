@extends('layouts.app')

@section('title', 'Domov')

@section('content')
<div class="book-container left-content">
    <h2 class="book-container-heading">Dostupné knihy</h2>
    <div class="book-container-content">
        @foreach ($available as $book)
            <p>{{ $book->nazov }} - {{ $book->autor }}</p>
        @endforeach
    </div>
</div>
<div class="book-container left-content">
    <h2 class="book-container-heading">Vypožičané knihy</h2>
    <div class="book-container-content">
        @foreach ($unavailable as $book)
            <p>{{ $book->nazov }} - {{ $book->autor }}</p>
        @endforeach
    </div>
</div>
@endsection

