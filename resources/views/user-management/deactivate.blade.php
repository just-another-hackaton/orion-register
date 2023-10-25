@extends ('layouts.app', ['portal' => 'kiosk'])

@section ('content')
    <div class="container-fluid py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item font-weight-bold" aria-current="page">
                    <a href="{{ route('welcome') }}" class="text-muted">
                        <x-heroicon-o-home class="icon icon-brand"/>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('kiosk.dashboard') }}" class="text-muted">
                        {{ __('Kiosk') }}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('kiosk.user-management.index') }}" class="text-muted">
                        {{  __('User management') }}
                    </a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">
                    {{  __('User deactivation') }}
                </li>
            </ol>
        </nav>

        <div class="page-header">
            <h2 class="page-title pt-0">{{ $user->name }}</h2>

            <div class="page-options d-flex">
                <a href="{{  route('kiosk.user-management.view', $user) }}" class="btn btn-reset border-0 shadow-sm mr-2">
                    <x-heroicon-o-x-circle class="icon text-danger mr-1"/> {{  __('Cancel') }}
                </a>

                <button form="deactivationForm" type="submit" class="btn btn-danger border-0 shadow-sm">
                    <x-heroicon-o-lock-closed class="icon mr-1"/> {{ __('Deactivate') }}
                </button>
            </div>
        </div>
    </div>

    <x-layouts.page-content>
        <div class="row mt-1">
            <div class="col-3">
                @include('user-management._partials.sidebar', ['user' => $user])
            </div>

            <x-form id="deactivationForm" action="{{ route('kiosk.user-management.deactivate', $user) }}"  class="offset-1 col-8">
                <div class="card card-body shadow-sm border-0">
                    <div class="alert alert-danger border-0 alert-important mb-0" role="alert">
                        <p class="mb-0">
                            {{ __('By deactivating the user in :application he/she will be prevented logging into the application.', ['application' => config('app.name', 'Laravel')]) }} <br>
                            {{ __('You will be also required to give a reason why he/she is deactivation, to inform the other webmasters and admins of the application.') }}
                        </p>
                    </div>

                    <hr>
                </div>
            </x-form>
        </div>
    </x-layouts.page-content>
@endsection
