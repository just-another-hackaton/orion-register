<div class="list-group list-group-transparent">
    <a href="{{ route('kiosk.user-management.view', $user) }}" class="{{ active('kiosk.user-management.view') }} list-group-item list-group-item-action">
        <x-heroicon-o-information-circle class="icon icon-subnav"/> {{ __('General information') }}
    </a>

    <a href="{{ route('kiosk.user-management.update', $user) }}" class="{{ active('kiosk.user-management.update') }} list-group-item list-group-item-action">
        <x-heroicon-o-pencil-square class="icon icon-subnav"/> {{ __('Edit information') }}
    </a>

    @can ('deactivate', $user)
        <a href="{{ route('kiosk.user-management.deactivate', $user) }}" class="{{ active('kiosk.user-management.deactivate') }} list-group-item list-group-item-action">
            <x-heroicon-o-lock-closed class="icon icon-subnav"/> {{ __('Deactivate account') }}
        </a>
    @endcan

    @can ('activate', $user)
        <a href="{{ route('kiosk.user-management.reactivate') }}" class="list-group-item list-group-item-action">
            <x-heroicon-o-lock-open class="icon icon-subnav"/> {{ __('Reactivate account') }}
        </a>
    @endcan

    <a href="" class="list-group-item list-group-item-action">
        <x-heroicon-o-trash class="icon icon-subnav text-danger"/> {{ __('Delete user') }}
    </a>
</div>
