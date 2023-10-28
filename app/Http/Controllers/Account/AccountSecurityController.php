<?php

declare(strict_types=1);

namespace App\Http\Controllers\Account;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;

final readonly class AccountSecurityController
{
    #[Get(uri: 'user/password', name: 'user-password.update')]
    public function __invoke(Request $request): Renderable
    {
        return view('account.user-security-settingd', ['user' => $request->user()]);
    }
}
