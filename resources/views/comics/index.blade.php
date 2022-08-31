@extends('layouts.app')

@section('main_content')
    <h1>I nostri Comics</h1>

    @foreach ($comics as $comic)
        <div style="border:1px solid red">
            <div>Nome: {{ $comic->title }}</div>
            <br>
            <div>Descrizione: {{ $comic['description'] }}</div>
            <div>
                <a href="{{ route('comics.show', ['comic' => $comic->id]) }}">Scopri di più</a>
            </div>
        </div>
        <br>
    @endforeach
@endsection