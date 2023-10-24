<div class="list-group list-group-transparent">
    <a href="{{ route('kiosk.user-management.view', $user) }}" class="{{ active('kiosk.user-management.view') }} list-group-item list-group-item-action">
        <x-heroicon-o-information-circle class="icon icon-subnav"/> {{ __('General information') }}
    </a>
</div>
