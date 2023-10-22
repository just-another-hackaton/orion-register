<?php

declare(strict_types=1);

namespace App\Http\Controllers\UerManagement;

use App\Policies\UserPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Spatie\RouteAttributes\Attributes\Get;

final readonly class ListUsersCopntroller
{
    use AuthorizesRequests;

    #[Get(
        uri: '',
        name: ''
    )]
    public function __invoke(): RedirectResponse
    {
        $this->authorize(UserPolicy::ViewAny);
    }
}
