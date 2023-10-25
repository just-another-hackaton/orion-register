@extends ('layouts.app', ['portal' => 'kiosk'])

@section('content')
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
                    {{  __('User information') }}
                </li>
            </ol>
        </nav>

        <div class="page-header">
            <h2 class="page-title pt-0">{{ $user->name }}</h2>

            <div class="page-options d-flex">
                <a href="{{ route('kiosk.user-management.index') }}" class="btn btn-reset border-0 shadow-sm mr-2">
                    <x-heroicon-o-users class="icon icon-subnav"/> {{ __('back to overview') }}
                </a>
            </div>
        </div>
    </div>

    <x-layouts.page-content>
        <div class="row mt-1">
            <div class="col-3">
                @include('user-management._partials.sidebar', ['user' => $user])
            </div>

            <div class="offset-1 col-8">
                <div class="card card-body shadow-sm border-0">

                </div>
            </div>
        </div>
    </x-layouts.page-content>
@endsection