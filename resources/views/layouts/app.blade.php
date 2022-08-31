<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    {{-- Layout di base da riutillzare per ogni page del sito --}}
    <header>
        <ul>
            <li>
                <a href=" {{ route('home') }} ">Home</a>
            </li>
            <li>
                <a href="{{ route('comics.index') }}">Comics</a>
            </li>
            <li>
                <a href="{{ route('comics.create') }}">Create Comics</a>
            </li>
        </ul>
    </header>
    
    {{-- Con lo yield mi occupo lo spazio utilizzato dalle altre pagine nel main_content --}}
    <main>
        @yield('main_content')
    </main>
</body>
</html>