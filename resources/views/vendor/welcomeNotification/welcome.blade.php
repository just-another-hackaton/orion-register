@extends ('layouts.app', ['portal' => 'website'])

@section ('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header border-bottom-0">
                        {{ __('Register initial password') }}
                    </div>

                    <x-form class="card-body">
                        <input type="hidden" name="email" value="{{ $user->email }}"/>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <x-error class="invalid-feedback font-weight-bold" field="password"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password"/>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn border-0 btn-submit">
                                    {{ __('Save password and login') }}
                                </button>
                            </div>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
@endsection
