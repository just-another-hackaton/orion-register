<?php

declare(strict_types=1);

namespace App\Listeners\Auth;

use Illuminate\Auth\Events\Login;

final readonly class UpdateLastSeenInformation
{
    public function handle(Login $login): void
    {
        $login->user->update(['last_seen_at' => now(), 'last_login_ip' => request()->ip()]);
    }
}
