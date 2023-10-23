<?php

declare(strict_types=1);

namespace App\Http\Controllers\UserManagement;

use Illuminate\Http\RedirectResponse;
use Spatie\RouteAttributes\Attributes\Get;

final readonly class DeleteUserController
{
    #[Get(uri: 'kiosk/user-management/{user}delete', name: 'kiosk.user-management.delete')]
    public function __invoke(): RedirectResponse
    {
        throw new \LogicException();
    }
}
