<?php

declare(strict_types=1);

namespace App\Http\Controllers\UserManagement;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\RouteAttributes\Attributes\Get;

final readonly class ListUsersController
{
    use AuthorizesRequests;

    #[Get(
        uri: 'kiosk/user-management',
        name: 'kiosk.user-management.index'
    )]
    public function __invoke(User $user): Renderable
    {
        $this->authorize(UserPolicy::ViewAny, $user);

        return view('user-management.index');
    }
}
