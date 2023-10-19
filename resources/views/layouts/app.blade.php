
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Favicons --}}
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">


    <!-- Styles -->
    @vite(['resources/js/app.js', 'resources/scss/app.scss'])
    @livewireStyles
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <a class="navbar-brand mr-auto mr-lg-0" href="#">
            <x-heroicon-o-cube-transparent class="icon-brand mr-2"/> {{ config('app.name', 'Laravel') }}
        </a>

        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>

        @env(['local', 'testing'])
            <span class="navbar-text text-danger mr-auto ml-4">
                <x-heroicon-o-exclamation-triangle class="icon mr-2" /> {{ __('The application is running in an local environment') }}
            </span>
        @endenv

        @guest
            <ul class="navbar-nav ml-auto">
                @if (Route::has('login'))
                    <li class="nav-item ">
                        <a class="nav-link {{ active('register') }}" href="{{ url('register') }}">
                            <x-heroicon-o-user-plus class="icon icon-navbar mr-1"/> {{ __('Register') }}
                        </a>
                    </li>
                @endif

                @if (Route::has('login'))
                    <li class="nav-item ">
                        <a class="nav-link {{ active('login') }}" href="{{ url('login') }}">
                            <x-heroicon-o-arrow-right-on-rectangle class="icon icon-navbar mr-1"/> {{ __('Login') }}
                        </a>
                    </li>
                @endif
            </ul>
        @else {{-- The user is currently authenticated --}}
        @endguest
    </nav>

    @auth('web')
        <div class="nav-scroller bg-white shadow-sm">
            <nav class="nav nav-underline">
                <a class="nav-link active" href="#">Dashboard</a>
            </nav>
        </div>
    @endauth

    <main role="main">
        @yield('content')
    </main>

    @livewireScripts
</body>
</html>
