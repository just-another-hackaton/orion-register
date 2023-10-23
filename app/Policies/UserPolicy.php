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

    public function create(User $user): bool
    {
        return $user->isAdministrator() || $user->isWebmaster();
    }

    public function view(User $user, User $model): bool
    {
        return $user->isAdministrator() || $user->isWebmaster();
    }

    public function update(User $user, User $model): bool
    {
        return $user->isAdministrator() || $user->isWebmaster();
    }

    public function delete(User $user, User $model): bool
    {
        return $user->isAdministrator() || $user->isWebmaster();
    }
}
