@extends('layouts.app')

{{-- Sezione in cui mostro tutti i prodotti in lista (ma non tutte le info) --}}
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
            <div>
                <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}">Modifica Comic</a>
            </div>
            <div>
                <form action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Cancella" onClick="return confirm('Sei sicuro di voler cancellare?');">
                </form>
            </div>
        </div>
        <br>
    @endforeach
@endsection