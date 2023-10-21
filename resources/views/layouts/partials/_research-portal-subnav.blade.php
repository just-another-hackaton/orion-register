<nav class="nav nav-underline">
    <a class="nav-link {{ active('/') }}" href="{{ url('/') }}">
        <x-heroicon-o-home class="icon icon-subnav" /> {{ __('Dashboard') }}
    </a>

    <a class="nav-link" href="">
        <x-heroicon-o-users class="icon icon-subnav" /> {{ __('Casualties') }}
    </a>

    <a class="nav-link" href="">
        <x-heroicon-o-users class="icon icon-subnav" /> {{ __('Squadrons') }}
    </a>

    <a class="nav-link" href="">
        <x-heroicon-o-users class="icon icon-subnav" /> {{ __('Airforces') }}
    </a>

    <a class="nav-link" href="">
        <x-heroicon-o-paper-airplane class="icon icon-subnav"/> {{ __('Airframes') }}
    </a>

    <a class="nav-link" href="">
        <x-heroicon-o-circle-stack class="icon icon-subnav"/> {{ __('Incidents') }}
    </a>

    <a class="nav-link" href="">
        <x-heroicon-o-list-bullet class="icon icon-subnav" /> {{ __('Memorials') }}
    </a>

    <a class="nav-link" href="">
        <x-heroicon-o-list-bullet class="icon icon-subnav" /> {{ __('Decorations') }}
    </a>
</nav>
