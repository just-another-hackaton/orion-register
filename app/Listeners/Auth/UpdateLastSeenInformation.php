<?php

declare(strict_types=1);

namespace App\Listeners\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Login;

final readonly class UpdateLastSeenInformation
{
    public function handle(Login $login): void
    {
        // Finding the user in the database. Based on the euthentication identifier.
        // Because the user from the login event likes to be bitching over an column
        // That is already in the $fillable array from the user model.
        $user = User::findOrFail($login->user->getAuthIdentifier());

        $user->update(['last_seen_at' => now(), 'last_login_ip' => request()->getClientIp()]);
    }
}
