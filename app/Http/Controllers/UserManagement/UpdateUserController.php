<?php

declare(strict_types=1);

namespace App\Http\Controllers\UserManagement;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Patch;

final readonly class UpdateUserController
{
    #[Get(uri: '/kiosk/user-management/{user}/update', name: 'kiosk.user-management.update')]
    public function edit(User $user): Renderable
    {

    }

    #[Patch(uri: '/kiosk/user-management/{user}/update', name: 'kiosk.user-management.update')]
    public function update(User $user): RedirectResponse
    {
    }
}
