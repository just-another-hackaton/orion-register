<?php

declare(strict_types=1);

namespace App\Http\Responses;

use App\Enums\Users\UserGroup;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Dashboards;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

final readonly class LoginResponse implements LoginResponseContract
{
    public function toResponse($request): RedirectResponse
    {
        return redirect()->action($this->getDashboardController($request));
    }

    private function getDashboardController($request)
    {
        return match($request->user()->user_group) {
            UserGroup::Researcher => Dashboards\ResearchDashboardController::class,
            UserGroup::Administrator => Dashboards\KioskDashboardController::class,
            UserGroup::Webmaster => Dashboards\KioskDashboardController::class,
            default => Dashboards\DashboardController::class,
        };
    }
}
