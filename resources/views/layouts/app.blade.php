<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', "Bug Make-Up")</title>

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>
<body>
    <div id="app">
        @include('partials.header')
        <main>
            @yield('content')
        </main>
        @include('partials/footer')
    </div>
</body>
</html>
