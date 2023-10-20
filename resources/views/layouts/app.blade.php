
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

        <ul class="navbar-nav ml-auto">
            @guest
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
            @else {{-- The user is currently authenticated --}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf {{-- Form field protection --}}
                </form>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="accountDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <x-heroicon-o-user-circle class="icon icon-navbar mr-1"/> {{ auth()->user()->name }}
                    </a>

                    <div class="dropdown-menu border-0 shadow-sm dropdown-menu-right" aria-labelledby="accountDropdown">
                        <div class="dropdown-header">{{ __('Account management') }}</div>

                        <a class="dropdown-item" href="">
                            <x-heroicon-o-adjustments-vertical class="icon icon-subnav"/> {{ __('Settings') }}
                        </a>

                        <a class="dropdown-item" target="_blank" href="{{ url('/docs') }}">
                            <x-heroicon-o-book-open class="icon icon-subnav"/> {{ __('Documentation') }}
                        </a>

                        <a class="dropdown-item" href="">
                            <x-heroicon-o-lifebuoy class="icon icon-subnav"/> {{ __('Support') }}
                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <x-heroicon-o-power class="icon text-danger mr-1"/> {{ __('Logout') }}
                        </a>
                    </div>
                </li>
            @endguest
        </ul>
    </nav>

    @auth('web')
        <div class="nav-scroller bg-white shadow-sm">
            <nav class="nav nav-underline">
                <a class="nav-link {{ active('/') }}" href="{{ url('/') }}">
                    <x-heroicon-o-home class="icon icon-subnav" /> {{ __('Dashboard') }}
                </a>
            </nav>
        </div>
    @endauth

    <main role="main">
        @yield('content')
    </main>

    @livewireScripts
</body>
</html>
