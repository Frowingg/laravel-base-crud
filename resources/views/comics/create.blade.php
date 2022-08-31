@extends('layouts.app')

{{-- Sezione in cui creo un nuovo prodotto --}}
@section('main_content')
    <h1>Crea un nuovo Comic</h1>

    {{-- If con il quale mi torno errori se non metto valori adatti --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form con cui mi creo il nuovo prodotto con tutte le sue varie info --}}
    {{-- Nella value lascia l'ultimo valore scritto anche se c'è un errore (così
         da non dovere obbligare l'utente a riscrive tutto) --}}

    {{-- Method POST -> per la creazione di nuovi ogetti --}}
    <form action="{{ route('comics.store') }}" method="post">

        {{-- @csrf -> per controllare che le informzaione arrivano da dentro il sito --}}
        @csrf

        <div>
            <label for="thumb">Url immagine</label>
            <input type="text" id="thumb" name="thumb" value="{{ old('thumb') }}">
        </div>
        <br>

        <div>
            <label for="title">Titolo</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}">
        </div>
        <br>

        <div>
            <label for="type">Tipo</label>
            <input type="text" id="type" name="type" value="{{ old('type') }}"> 
        </div>
        <br>

        <div>
            <label for="price">Prezzo</label>
            <input type="text" id="price" name="price" value="{{ old('price') }}">
        </div>
        <br>

        <div>
            <label for="sale_date">Data</label>
            <input type="text" id="sale_date" name="sale_date" value="{{ old('sale_date') }}">
        </div>
        <br>

        <div>
            <label for="series">Serie</label>
            <input type="text" id="series" name="series" value="{{ old('series') }}">
        </div>
        <br>

        <div>
            <label for="description">Descrizione</label>
            <textarea name="description" id="description" cols="30" rows="10" {{ old('description') }}></textarea>
        </div>
        <br>

        <input type="submit" value="Salva">
    </form>
@endsection