<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ __(config('app.name', 'Zaverečné zadanie')) }}</title>

        <!-- Scripts -->
        @vite(['resources/css/bootstrap.min.css', 'resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            <nav class="navbar navbar-dark w-100 d-flex fixed-top">
                <div class="navbar-nav ms-auto flex-row pe-2 d-flex gap-1">
                    <a href="{{ url('/language/en') }}" class="@if(app()->isLocale('en')) active @endif nav-link">en</a>
                    <span class="nav-link text-white">|</span>
                    <a href="{{ url('/language/sk') }}" class="@if(app()->isLocale('sk')) active @endif nav-link">sk</a>
                </div>
            </nav>

            <main>
                <div class="container min-h-screen d-flex align-items-center">
                    @yield('content')
                </div>
            </main>
        </div>
    </body>
</html>
