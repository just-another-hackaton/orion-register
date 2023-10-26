@extends ('layouts.app', ['portal' => 'website'])

@section ('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">{{ $user->name }}</h1>
            <div class="page-subtitle">{{ __('General information setting from your account') }}</div>
        </div>
    </div>

    <x-layouts.page-content>
        <div class="row mt-1">
        </div>
    </x-layouts.page-content>
@endsection
