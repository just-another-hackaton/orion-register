@extends('layouts.app')

@section ('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header border-bottom-0">{{ __('Login') }}</div>

                    <x-form action="{{ route('login') }}" class="card-body">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <x-error field="email" class="font-weight-bold invalid-feedback" role="alert"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <x-error field="password" class="font-weight-bold invalid-feedback" role="alert"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-submit">
                                    <x-heroicon-o-arrow-right-on-rectangle class="icon mr-1"/> {{ __('Login') }}
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

                @env(['local', 'testing'])
                    <hr>

                    <div class="card border-0 shadow-sm">
                        <div class="card-header card-header-logins">
                            <x-heroicon-o-code-bracket class="icon mr-1"/> {{ __('Developer logins') }}
                        </div>

                        <div class="card-body">
                            <p class="card-text text-muted">
                                {{ __('When developing on this app we need some test users for quickly loggin in the app.') }}
                                {{ __('Thats why we implemented this section under the local and testing environment.') }}
                                {{ __('Se we can quickly login with the login that is related to the application role.') }}
                            </p>

                            <hr>

                            <ul class="list-unstyled mb-0">
                                <li>
                                    <x-login-link
                                        class="btn btn-link p-0"
                                        label="{{ __('Authenticate as normal user') }}"
                                        :user-attributes="['user_group' => \App\Enums\Users\UserGroup::User->value]"
                                        email="user@domain.tld"
                                    />
                                </li>
                                <li>
                                    <x-login-link
                                        class="btn btn-link p-0"
                                        label="{{ __('Authenticate as researcher') }}"
                                        :user-attributes="['user_group' => \App\Enums\Users\UserGroup::Researcher->value]"
                                        email="webmaster@domain.tld"
                                    />
                                </li>
                                <li>
                                    <x-login-link
                                        class="btn btn-link p-0"
                                        :user-attributes="['user_group' => \App\Enums\Users\UserGroup::Administrator->value]"
                                        label="{{ __('Authenticate as administrator') }}"
                                        email="administrator@domain.tld"
                                    />
                                </li>
                                <li>
                                    <x-login-link
                                        class="btn btn-link p-0"
                                        label="{{ __('Authenticate as webmaster') }}"
                                        :user-attributes="['user_group' => \App\Enums\Users\UserGroup::Webmaster->value]"
                                        email="webmaster@domain.tld"
                                    />
                                </li>
                            </ul>
                        </div>
                    </div>
                @endenv
            </div>
        </div>
    </div>
@endsection
