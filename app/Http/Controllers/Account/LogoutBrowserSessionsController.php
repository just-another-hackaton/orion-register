<?php

declare(strict_types=1);

namespace App\Http\Controllers\Account;

use App\Services\OtherBrowserSessionsService;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Http\RedirectResponse;
use Spatie\RouteAttributes\Attributes\Delete;

/**
 * This controller is solely responsible for deleting other browser sessions from the authenticated user in the orion register.
 * Note that we implement a service method instead of an action call. Because we can't really do the deleting in one method callp.
 * Might subject to change later on in the project.
 */
final readonly class LogoutBrowserSessionsController
{
    #[Delete(uri: 'user-security/logout-other-sessions', name: 'user-security.delete-session', middleware: RequirePassword::class)]
    public function __invoke(OtherBrowserSessionsService $otherBrowserSessionsService): RedirectResponse
    {
        $otherBrowserSessionsService->deleteOtherSessionRecords();

        return redirect()->action(AccountSecurityController::class);
    }
}
