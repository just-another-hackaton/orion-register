<?php

declare(strict_types=1);

namespace App\Http\Controllers\UserManagement;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Spatie\RouteAttributes\Attributes\Get;

final readonly class ViewUserController
{
    #[Get(uri: 'kiosk/user-management/{user}', name: 'kiosk.user-management.view')]
    public function __invoke(User $user): Renderable
    {
    }
}
