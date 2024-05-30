@extends('layouts.app')

@section('title', 'Domov')

@section('content')
<div class="book-container left-content content">
    <h2 class="book-container-heading heading">Dostupné knihy</h2>
    <div class="table-content">
        <table>
            <thead>
                <tr>
                    <th>Názov</th>
                    <th>Spisovateľ</th>
                    <th>Rok vydania</th>
                    <th>Žáner</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($available as $book)
                    <tr>
                        <td>{{ $book->nazov }}</td>
                        <td>{{ $book->autor }}</td>
                        <td>{{ $book->rok_vydania }}</td>
                        <td>{{ $book->zaner }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</div>
<div class="book-container right-content content">
    <h2 class="book-container-heading heading">Vypožičané knihy</h2>
    <div class="table-content">
        <table>
            <thead>
                <tr>
                    <th>Názov</th>
                    <th>Spisovateľ</th>
                    <th>Rok vydania</th>
                    <th>Žáner</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unavailable as $book)
                    <tr>
                        <td>{{ $book->nazov }}</td>
                        <td>{{ $book->autor }}</td>
                        <td>{{ $book->rok_vydania }}</td>
                        <td>{{ $book->zaner }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</div>
@endsection

