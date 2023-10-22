<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use App\Enums\Users\UserGroup;

/**
 * This trait is solely responsible for mapping the user group to functions, to determine which user group the user is on.
 * It will greatly improve the readability from the source code as the project grows.
 */
trait UserGroupMethods
{
    public function isUser(): bool
    {
        return $this->user_group === UserGroup::User;
    }

    public function isResearcher(): bool
    {
        return $this->user_group === UserGroup::Researcher;
    }

    public function isWebmaster(): bool
    {
        return $this->user_group === UserGroup::Webmaster;
    }

    public function isAdministrator(): bool
    {
        return $this->user_group === UserGroup::Administrator;
    }
}
