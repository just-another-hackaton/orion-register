<?php

declare(strict_types=1);

namespace App\Actions\UserManagement;

use App\Models\User;

final readonly class DeleteUser
{
    /**
     * @todo Implement mail notification to notify the user of the account deletion.
     */
    public function execute(User $user): void
    {

    }
}
