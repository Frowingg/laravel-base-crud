@extends('layouts.app')

{{-- Sezione in cui mostro tutte le informazione di un prodotto specifico --}}
@section('main_content')

    <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
    <br>
    <h1>{{ $comic->title }}</h1>
    <br>
    <div>Type: {{ $comic->type }}</div>
    <br>
    <div>Prezzo: {{ $comic->price }}</div>
    <br>
    <p>Descrizione: {{ $comic->description }}</p>
    <br>
    <div>Serie: {{ $comic->series }}</div>
    <br>
    <div>Data: {{ $comic->sale_date }}</div>

@endsection
