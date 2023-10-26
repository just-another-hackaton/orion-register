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
<body class="d-flex flex-column h-100">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand mr-auto mr-lg-0" href="#">
                <x-heroicon-o-cube-transparent class="icon-brand mr-2"/> {{ config('app.name', 'Laravel') }}

                @if ($portal === 'kiosk')
                    - {{ __('Kiosk') }}
                @elseif ($portal === 'research')
                    - {{ __('Research portal') }}
                @endif
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
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

                    @if (auth()->user()->can('access-kiosk') || auth()->user()->can('access-research-portal'))
                        <li class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" id="portalDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <x-heroicon-o-arrows-right-left class="icon icon-navbar mr-1"/> {{ __('switch portal') }}
                            </a>

                            <div class="dropdown-menu border-0 shadow-sm dropdown-menu-right" aria-labelledby="portalDropdown">
                                <a class="dropdown-item" href="{{ route('welcome') }}">
                                    <x-heroicon-o-globe-europe-africa class="icon icon-subnav"/> {{ __('Website') }}
                                </a>

                                <div class="dropdown-divider"></div>

                                @can('access-kiosk')
                                    <a class="dropdown-item" href="{{ route('kiosk.dashboard') }}">
                                        <x-heroicon-o-wrench-screwdriver class="icon icon-subnav"/> {{ __('Kiosk portal') }}
                                    </a>
                                @endcan

                                @can ('access-research-portal')
                                    <a class="dropdown-item" href="{{ route('research-portal.dashboard') }}">
                                        <x-heroicon-o-document-magnifying-glass class="icon icon-subnav" /> {{ __('Research portal') }}
                                    </a>
                                @endcan
                            </div>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="accountDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <x-heroicon-o-user-circle class="icon icon-navbar mr-2"/> {{ auth()->user()->name }}
                        </a>

                        <div class="dropdown-menu border-0 shadow-sm dropdown-menu-right" aria-labelledby="accountDropdown">
                            <div class="dropdown-header">{{ __('Account management') }}</div>

                            <a class="dropdown-item" href="{{ route('account.settings.information') }}">
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
            </div>
        </nav>


        @auth
            <div class="nav-scroller bg-white shadow-sm">
                @includeWhen($portal === 'website', 'layouts.partials._website-subnav')
                @includeWhen($portal === 'kiosk', 'layouts.partials._kiosk-subnav')
                @includeWhen($portal === 'research', 'layouts.partials._research-portal-subnav')
            </div>
        @endauth


        <main role="main" class="flex-shrink-0">
            @yield('content')
        </main>
    </div>

    <div class="footer py-3 mt-auto">
        <div class="container-fluid">
           <div class="float-left">
               <ul class="list-inline mb-0">
                   <li class="list-inline-item color-brand">
                       &copy {{ config('app.name', 'Laravel') }}
                   </li>
               </ul>
           </div>

            <div class="float-right">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a href="" class="text-decoration-none text-muted">
                            <x-heroicon-o-eye-slash class="icon icon-subnav mr-1"/> {{ __('Privacy policy') }}
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="" class="text-decoration-none text-muted">
                            <x-heroicon-o-document-text class="icon icon-subnav"/> {{ __('Terms of service') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @livewireScripts
</body>
</html>
