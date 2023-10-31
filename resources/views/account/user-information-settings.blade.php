@extends ('layouts.app', ['portal' => 'website'])

@section ('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">{{ $user->name }}</h1>
            <div class="page-subtitle">{{ __('General information setting from your account') }}</div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            @include ('account.partials._settings-navigation')

            <div class="col-3">
                @include ('account.partials._side-navigation')
            </div>

            <div class="offset-1 col-md-8">
                <x-form action="{{ route('user-profile-information.update') }}" method="PUT" class="card border-0 shadow-sm">
                    <div class="card-header border-bottom-0">
                        <x-heroicon-o-identification class="icon icon-subnav"/> {{  __('General account information') }}
                    </div>
                    <div class="card-body">
                        @if (session()->has('profileInformationUpdated'))
                            <div class="alert alert-success border-0" role="alert">
                                {{ session()->get('profileInformationUpdated') }}
                            </div>
                        @endif

                        <div class="form-row">
                            <div class="form-group col-5">
                                <label for="firstName">{{ __('First name') }} <span class="font-weight-bold text-danger">*</span></label>
                                <input type="text" id="firstName" name="firstname" class="form-control @error('firstname', 'updateProfileInformation') is-invalid @enderror" value="{{ old('firstname', $user->firstname) }}">

                                <x-error field="firstname" bag="updateProfileInformation" class="invalid-feedback font-weight-bold"/>
                            </div>

                            <div class="form-group col-7">
                                <label for="lastName">{{  __('Last name') }} <span class="font-weight-bold text-danger">*</span></label>
                                <input type="text" id="lastName" name="lastname" class="form-control @error('lastname', 'updateProfileInformation') is-invalid @enderror" value="{{ old('lastname', $user->lastname) }}">

                                <x-error field="lastname" bag="updateProfileInformation" class="invalid-feedback font-weight-bold"/>
                            </div>

                            <div class="form-group col-12 mb-0">
                                <label for="email">{{  __('E-mail address') }} <span class="font-weight-bold text-danger">*</span></label>
                                <input type="email" id="email" name="email" class="form-control @error('email', 'updateProfileInformation') is-invalid @enderror" value="{{ old('email', $user->email) }}">

                                <x-error field="email" bag="updateProfileInformation" class="invalid-feedback font-weight-bold"/>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-top-0">
                        <button type="submit" class="float-right btn btn-submit border-0">
                            <x-heroicon-o-pencil-square class="icon mr-1"/> {{ __('save') }}
                        </button>
                    </div>
                </x-form>

                <hr>

                <x-form action="{{ route('user-profile-information.delete', $user) }}" method="DELETE" class="card shadow-sm border-0">
                    <div class="card-header-danger card-header">
                        <x-heroicon-o-user-minus class="icon mr-1"/> {{ __('Account deletion') }}
                    </div>
                    <div class="card-body">
                        <p class="card-text text-muted mb-0">
                            {{  __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                            {{ __('Once your account is marked for deletion by your we will keep it for another 2 weeks in our systems. In case the deletion was a mistake.') }}
                        </p>

                        <hr>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-danger">
                                <x-heroicon-o-trash class="icon mr-1"/> {{ __('delete account') }}
                            </button>
                        </div>
                    </div>
                </x-form>
            </div>
        </div>
    </div>
@endsection
