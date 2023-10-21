<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Enums\Users\UserGroup;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('access-kiosk', function (User $user): bool {
            return $user->user_group === UserGroup::Researcher
                || $user->user_group === UserGroup::Administrator
                || $user->user_group === UserGroup::Webmaster;
        });
    }
}
