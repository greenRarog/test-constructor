<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel='stylesheet' href='{{ URL::asset('css/css.css'); }}'>
        <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    </head>
            <!-- Page Content -->
            <x-header.header />
            <div class='midle'>
                <div class='column'>
                    <x-midle.menu />
                </div>    
                <main class='main'>
                    {{ $slot }}
                </main>
                <div class='column'>
                    <x-midle.banner />
                </div>
            </div>
            <x-footer.footer />
    </body>
</html>
