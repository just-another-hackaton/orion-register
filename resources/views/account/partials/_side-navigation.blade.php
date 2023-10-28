<div class="list-group list-group-transparent">
    <a href="{{ route('account.settings.information') }}" class="{{ active('account.settings.information') }} list-group-item list-group-item-action">
        <x-heroicon-o-identification class="icon icon-subnav"/> {{ __('account information') }}
    </a>

    <a href="" class="list-group-item list-group-item-action">
        <x-heroicon-o-shield-check class="icon icon-subnav"/> {{ __('Account security') }}
    </a>

    <a href="" class="list-group-item list-group-item-action">
        <x-heroicon-o-key class="icon icon-subnav"/> {{ __('2FA authentication') }}
    </a>
</div>
