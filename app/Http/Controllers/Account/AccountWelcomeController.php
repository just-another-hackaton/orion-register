<?php

declare(strict_types=1);

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Dashboards\DashboardController;
use Illuminate\Http\Response;
use Spatie\WelcomeNotification\WelcomeController;

/**
 * This controller will be used to show the welcome form and to save the password set by a user.
 * Note that we register the routes for this controller in the route/web.php file
 * because the package doesn't allow us to make use of route attributes.
 */
final class AccountWelcomeController extends WelcomeController
{
    public function sendPasswordSavedResponse(): Response
    {
        return redirect()->action(DashboardController::class);
    }
}
