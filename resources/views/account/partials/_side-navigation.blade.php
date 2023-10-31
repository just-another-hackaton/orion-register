<div class="list-group list-group-transparent">
    <a href="{{ route('account.settings.information') }}" class="{{ active('account.settings.information') }} list-group-item list-group-item-action">
        <x-heroicon-o-identification class="icon icon-subnav"/> {{ __('account information') }}
    </a>

    <a href="{{ route('user-password.update') }}" class="{{ active('user-password.update') }} list-group-item list-group-item-action">
        <x-heroicon-o-shield-check class="icon icon-subnav"/> {{ __('Account security') }}
    </a>
</div>
