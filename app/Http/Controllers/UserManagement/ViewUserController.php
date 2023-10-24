<?php

declare(strict_types=1);

namespace App\Http\Controllers\UserManagement;

use App\Models\User;
use App\Support\BasePolicy;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\RouteAttributes\Attributes\Get;

final readonly class ViewUserController
{
    use AuthorizesRequests;

    #[Get(uri: 'kiosk/user-management/{user}', name: 'kiosk.user-management.view')]
    public function __invoke(User $user): Renderable
    {
        $this->authorize(BasePolicy::View, $user);

        return view('user-management.show', ['user' => $user]);
    }
}
