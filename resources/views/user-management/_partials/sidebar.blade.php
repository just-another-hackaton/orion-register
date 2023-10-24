<div class="list-group list-group-transparent">
    <a href="{{ route('kiosk.user-management.view', $user) }}" class="{{ active('kiosk.user-management.view') }} list-group-item list-group-item-action">
        <x-heroicon-o-information-circle class="icon icon-subnav"/> {{ __('General information') }}
    </a>
    <a href="{{ route('kiosk.user-management.update', $user) }}" class="{{ active('kiosk.user-management.update') }} list-group-item list-group-item-action">
        <x-heroicon-o-pencil-square class="icon icon-subnav"/> {{ __('Edit information') }}
    </a>
    <a href="" class="list-group-item list-group-item-action">
        <x-heroicon-o-trash class="icon icon-subnav text-danger"/> {{ __('Delete user') }}
    </a>
</div>
