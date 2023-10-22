<?php

namespace App\Policies;

use App\Models\User;
use App\Support\BasePolicy;

final class UserPolicy extends BasePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isAdministrator() || $user->isWebmaster();
    }
}
