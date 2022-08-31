@extends('layouts.app')

@section('main_content')
    <h1>Modifica Comic</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="post">
        @csrf
        @method('PUT')

        <div>
            <label for="thumb">Url immagine</label>
            <input type="text" id="thumb" name="thumb" value="{{ old('thumb') ? old('thumb') : $comic->thumb }}">
        </div>
        <br>

        <div>
            <label for="title">Titolo</label>
            <input type="text" id="title" name="title" value="{{ old('title') ? old('title') : $comic->title }}">
        </div>
        <br>

        <div>
            <label for="type">Tipo</label>
            <input type="text" id="type" name="type" value="{{ old('type') ? old('type') : $comic->type }}"> 
        </div>
        <br>

        <div>
            <label for="price">Prezzo</label>
            <input type="text" id="price" name="price" value="{{ old('price') ? old('price') : $comic->price }}">
        </div>
        <br>

        <div>
            <label for="sale_date">Data</label>
            <input type="text" id="sale_date" name="sale_date" value="{{ old('sale_date') ? old('sale_date') : $comic->sale_date }}">
        </div>
        <br>

        <div>
            <label for="series">Serie</label>
            <input type="text" id="series" name="series" value="{{ old('series') ? old('series') : $comic->series }}">
        </div>
        <br>

        <div>
            <label for="description">Descrizione</label>
            <textarea name="description" id="description" cols="30" rows="10"> {{ old('description') ? old('description') : $comic->description }}</textarea>
        </div>
        <br>

        <input type="submit" value="Salva">
    </form>
@endsection