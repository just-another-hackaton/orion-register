@extends ('layouts.app', ['portal' => 'kiosk', 'title' => 'User management'])

@section ('content')
    <div class="container-fluid my-3">
        <div class="page-header">
            <h1 class="page-title">{{  __('User management') }}</h1>
            <div class="page-subtitle">{{  __('Overview from all the users in the application') }}</div>

            <div class="d-flex page-options">
                @can ('create', auth()->user())
                    <a href="{{ route('kiosk.user-management.create') }}" class="border-0 shadow-sm btn btn-option">
                        <x-heroicon-o-user-plus class="icon"/>
                    </a>
                @endcan

                <div class="btn-group ml-2">
                    <button type="button" class="btn btn-option border-0 shadow-sm dropdown-toggle" data-toggle="dropdown" ari aria-haspopup="true" aria-expanded="false">
                        <x-heroicon-o-funnel class="icon mr-1"/> {{  __('Filter') }}
                    </button>

                    <div class="dropdown-menu dropdown-menu-right border-0 shadow-sm">
                        @foreach ($filterCriterias as $filterCriteria)
                            <a href="{{ route('kiosk.user-management.index', ['filter' => $filterCriteria['value']]) }}" class="dropdown-item">
                                <x-heroicon-o-user-group class="icon icon-subnav"/> {{ __(':type accounts', ['type' => $filterCriteria['name']]) }}
                            </a>
                        @endforeach

                        <div class="dropdown-divider"></div>

                        <a href="{{ route('kiosk.user-management.index') }}" class="dropdown-item">
                            <x-heroicon-o-user-group class="icon icon-subnav"/> {{  __('All accounts') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-layouts.page-content>
        @if ($users->total() > 0)
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-sm table mb-0">
                            <thead>
                                <tr>
                                    <th class="border-top-0" scope="col">{{ __('Name') }}</th>
                                    <th class="border-top-0" scope="col">{{ __('Status') }}</th>
                                    <th class="border-top-0" scope="col">{{ __('E-mail address') }}</th>
                                    <th class="border-top-0" scope="col">{{ __('User group') }}</th>
                                    <th class="border-top-0" scope="col">{{ __('Last seen') }}</th>
                                    <th class="border-top-0" colspan="2" scope="col">{{ __('Registered at') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="font-weight-bold text-muted">{{  $user->name }}</td>
                                        <td>
                                            @if ($user->isOnline())
                                                <span class="badge label-online">
                                                    {{ __('online') }}
                                                </span>
                                            @elseif(! $user->isOnline())
                                                <span class="badge label-offline">
                                                    {{ __('offline') }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="mailto:{{ $user->email }}">
                                                {{ $user->email }}
                                            </a>
                                        </td>
                                        <td>
                                            <span class="badge {{ $user->user_group->getLabelClass() }}">
                                                {{ $user->user_group->getLabelText() }}
                                            </span>
                                        </td>
                                        <td>{{ optional($user->last_seen_at)->diffForHumans() ?? '-' }}</td>
                                        <td>{{ $user->created_at->format('d/m/Y H:i:s') }}</td>

                                        <td>
                                            <span class="float-right">
                                                @can ('view', $user)
                                                    <a href="{{ route('kiosk.user-management.view', $user) }}" class="text-decoration-none text-muted">
                                                        <x-heroicon-o-eye class="icon"/>
                                                    </a>
                                                @endcan

                                                @can ('update', $user)
                                                    <a href="{{ route('kiosk.user-management.update', $user) }}" class="text-decoration-none ml-3 text-muted">
                                                        <x-heroicon-o-pencil-square class="icon"/>
                                                    </a>
                                                @endcan

                                                @can ('delete', $user)
                                                    <a href="{{ route('kiosk.user-management.delete', $user) }}" class="text-decoration-none ml-1 text-danger">
                                                        <x-heroicon-o-trash class="icon"/>
                                                    </a>
                                                @endcan
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer border-top-0">
                    <div class="row">
                        {{-- @todo Implement pagination for the overview table --}}

                        <div class="col text-secondary text-right my-auto">
                            {{ $users->firstItem() ?? 0 }} to {{ $users->lastItem() ?? 0 }} from {{ $users->total() }} users
                        </div>
                    </div>
                </div>
            </div>
        @else {{-- There are users found in the application --}}
        @endif
    </x-layouts.page-content>
@endsection
