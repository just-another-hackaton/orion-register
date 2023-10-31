@extends ('layouts.app', ['portal' => 'website'])

@section ('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">{{ $user->name }}</h1>
            <div class="page-subtitle">{{ __('Security related settings for your account?') }}</div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            @include ('account.partials._settings-navigation')

            <div class="col-3">
                @include ('account.partials._side-navigation')
            </div>

            <div class="offset-1 col-md-8">
                <x-form action="{{ route('user-password.update') }}" method="PUT" class="card border-0 shadow-sm">
                    <div class="card-header border-bottom-0">
                        <x-heroicon-o-shield-check class="icon icon-subnav"/> {{ __('Account security settings') }}
                    </div>

                    <div class="card-body">
                        @if (session()->has('profileInformationUpdated'))
                            <div class="alert alert-success border-0" role="alert">
                                {{ session()->get('profileInformationUpdated') }}
                            </div>
                        @endif

                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="currentPassword">{{  __('Current password') }} <span class="font-weight-bold text-danger">*</span></label>
                                <input type="password" name="current_password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" id="currentPassword" autofocus autocomplete="off">

                                <x-error class="invalid-feedback font-weight-bold" field="current_password" bag="updatePassword"/>
                            </div>

                            <div class="form-group col-6 mb-0">
                                <label for="newPassword"">{{ __('New password') }} <span class="font-weight-bold text-danger">*</span></label>
                                <input type="password" name="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" id="newPassword" autocomplete="off"/>

                                <x-error class="invalid-feedback font-weight-bold" field="current_password" bag="updatePassword"/>
                            </div>

                            <div class="form-group col-6 mb-0">
                                <label for="passwordConfirmation">{{  __('Repeat new password') }} <span class="font-weight-bold text-danger">*</span></label>
                                <input type="password" class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" id="passwordConfirmation" name="password_confirmation" autocomplete="off"/>

                                <x-error class="invalid-feedback font-weight-bold" field="password_confirmation" bag="updatePassword"/>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-top-0">
                        <button type="submit" class="float-right btn btn-submit border-0">
                            <x-heroicon-o-pencil-square class="icon mr-1"/> {{  __('save') }}
                        </button>
                    </div>
                </x-form>

                @if ($browserSessionService->isUsingDatabaseDriver())
                    <hr>

                    <x-form action="{{ route('user-security.delete-session') }}" method="DELETE" class="card border-0 shadow-sm">
                        <div class="card-header border-bottom-0">
                            <x-heroicon-o-circle-stack class="icon icon-subnav"/> {{ __('Browser sessions') }}
                        </div>

                        <div class="card-body">
                            <p class="card-text text-muted mb-0">
                                {{ __('If neccessary, you may logout all of your browser sessions accross all of your devices.') }}
                                {{ __('Some of your recent browser sessions are listed below; however, this lost may not be axhaustive.') }}
                                {{ __('If your feel your account has been compromised, you should also update your password.') }}
                            </p>
                        </div>

                        <ul class="list-group list-group-flush">
                            @foreach ($browserSessionService->getSessionEntities() as $sessionEntity)
                                <li class="list-group-item @if($loop->first) border-top @endif">
                                    <div class="media">
                                        @if ($sessionEntity->agent->isDesktop())
                                            <x-heroicon-o-computer-desktop class="mr-3 icon icon-device icon-lg"/>
                                        @elseif ($sessionEntity->agent->isTablet())
                                            <x-heroicon-o-device-tablet class="mr-3 icon icon-device icon-lg"/>
                                        @else
                                            <x-heroicon-o-device-phone-mobile class="mr-3 icon icon-device icon-lg"/>
                                        @endif

                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1 text-muted">
                                                {{ $sessionEntity->agent->platform() }} - {{ $sessionEntity->agent->browser() }}

                                                @if ($sessionEntity->is_current_device)
                                                    <span class="ml-2 badge label-current-device">{{ __('current-device') }}</span>
                                                @endif
                                            </h6>

                                            <div class="small text-muted">
                                                <span class="mr-3">{{ $sessionEntity->ip_address }}</span>
                                                {{ __('last seen: :timestamp', ['timestamp' => $sessionEntity->last_active]) }}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <div class="card-body">
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-submit border-0">
                                    <x-heroicon-o-trash class="icon mr-1"/> {{ __('Logout other browser sessions') }}
                                </button>
                            </div>
                        </div>
                    </x-form>
                @endif
            </div>
        </div>
    </div>
@endsection
