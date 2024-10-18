<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body>
        <header>
        <h1>@yield('header')</h1>
        </header>
        <div class="container">
        @yield('content')
        </div>
    </body>
</html>