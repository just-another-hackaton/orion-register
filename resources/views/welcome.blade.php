@extends('layouts.app', ['portal' => 'website'])

@section ('content')
    <div class="container-fluid my-3">
        <div class="page-header">
            <h1 class="page-title">Archive search</h1>
            <div class="page-subtitle">{{ __('Search for an casualty in our records.') }}</div>

            <div class="page-options d-flex">
                <div class="btn-group">
                    <a href="{{ route('welcome') }}" class="btn {{ active('welcome') }} btn-sm btn-outline-dark">
                        <x-heroicon-o-magnifying-glass-circle class="icon mr-1"/> {{ __('casualty search') }}
                    </a>

                    <a href="" class="btn btn-sm btn-outline-dark">
                        <x-heroicon-o-magnifying-glass-circle class="icon mr-1"/> {{ __('incident search') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <x-layouts.page-content>
        <div class="card shadow-sm border-0">
            <div class="card-header border-bottom-0">
                {{ __('Casualty search form') }}
            </div>

            <div class="card-body">
                <form action="{{ route('welcome') }}">
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="serviceNumber">{{ __('Service number') }}</label>
                            <input type="text" id="serviceNumber" class="form-control" value="{{ old('service_number') }}" name="service_number"/>
                        </div>
                        <div class="form-group col-6">
                            <label for="airframeNumber">{{ __('Airframe number') }}</label>
                            <input type="text" id="airframeNumber" class="form-control" value="{{ old('airframe_number') }}" name="airframe_number"/>
                        </div>
                        <div class="form-group col-6">
                            <label for="surnames">{{ __('Surnames') }}</label>
                            <input type="text" id="surnames" class="form-control" value="{{ old('surnames') }}" name="surnames"/>
                        </div>
                        <div class="form-group col-6">
                            <label for="lastname">{{ __('Lastname') }}</label>
                            <input type="text" id="lastname" class="form-control" value="{{ old('lastname') }}" name="lastname">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 mb-0">
                            <button type="submit" class="btn btn-submit border-0 shadow-sm">
                                {{ __('search casualty') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <hr class="my-3">
    </x-layouts.page-content>
@endsection
