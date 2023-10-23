<?php

declare(strict_types=1);

namespace App\Http\Controllers\UserManagement;

use App\Enums\Users\UserGroup;
use Illuminate\Contracts\Support\Renderable;
use Spatie\RouteAttributes\Attributes\Get;

final readonly class CreateNewUserController
{
    #[Get(name: 'kiosk.user-management.create', uri: 'user-management/create')]
    public function __invoke(): Renderable
    {
        return view('user-management.create', ['userGroups' => UserGroup::cases()]);
    }
}
