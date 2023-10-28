<?php

declare(strict_types=1);

namespace App\Http\Controllers\Account;

use App\Actions\UserManagement\DeleteUser;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\RouteAttributes\Attributes\Delete;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware(middleware: RequirePassword::class)]
final readonly class AccountDeletionController
{
    use AuthorizesRequests;

    #[Delete(uri: 'account/deletion/{user}', name: 'user-profile-information.delete')]
    public function __invoke(User $user, DeleteUser $deleteUser): Renderable
    {
        $this->authorize(UserPolicy::Delete, $user);
        $deleteUser->execute($user);

        return redirect()->route('login');
    }
}
