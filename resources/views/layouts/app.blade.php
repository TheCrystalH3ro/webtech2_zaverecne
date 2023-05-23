<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ __(config('app.name', 'Zaverečné zadanie')) }}</title>

        <!-- Scripts -->
        @vite(['resources/css/bootstrap.min.css', 'resources/css/style.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased @auth {{ auth()->user()->role->name }} @endauth">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <main>
                <div class="container min-h-screen d-flex align-items-center">
                    @yield('content')
                </div>
            </main>
        </div>
    </body>
</html>
