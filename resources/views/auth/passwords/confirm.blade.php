@extends('layouts.app', ['portal' => 'website'])

@section ('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header border-bottom-0"> {{  __('Confirm password') }}</div>

                    <x-form action="{{ route('password.confirm') }}" class="card-body">
                        <p class="text-danger mb-0 card-text">
                            <x-heroicon-o-bell-alert class="icon mr-1"/> {{ __('Please confirm your password before continuing.') }}
                        </p>

                        <hr>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{  __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <x-error field="password" class="invalid-feedback font-weight-bold" role="alert"/>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-submit border-0">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
@endsection
