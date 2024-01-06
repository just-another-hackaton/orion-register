<div class="col-12 pb-4">
    <ul class="nav-settings nav-overflow nav">
        <li class="nav-item">
            <a class="nav-link {{ active(['account.settings.information', 'user-password.update']) }}" href="{{ route('account.settings.information') }}">
                <x-heroicon-o-adjustments-vertical class="icon icon-subnav"/> {{ __('Account settings') }}
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="">
                <x-heroicon-o-bars-4 class="icon icon-subnav"/> {{ __('authentication log') }}
            </a>
        </li>
    </ul>
</div>
