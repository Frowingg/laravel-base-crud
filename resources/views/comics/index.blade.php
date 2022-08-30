@extends('layouts.app')

@section('main-content')
    <h1>I nostri Comics</h1>

    @foreach ($comics as $comic)
        <div>
            <div>Nome: {{ $comic->title }}</div>
            <div>Nome: {{ $comic->description }}</div>
            
        </div>
        <br>
    @endforeach
@endsection