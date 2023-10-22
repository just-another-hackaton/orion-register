<nav class="nav nav-underline">
    <a class="nav-link {{ active('kiosk') }}" href="{{ url('kiosk') }}">
        <x-heroicon-o-home class="icon icon-subnav" /> {{ __('Dashboard') }}
    </a>

    @can ('viewAny', auth()->user())
        <a class="nav-link {{ active('kiosk.user-management.*') }}" href="{{ route('kiosk.user-management.index') }}">
            <x-heroicon-o-user-group class="icon icon-subnav" /> {{ __('Users') }}
        </a>
    @endcan
</nav>
