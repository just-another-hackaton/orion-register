<?php

declare(strict_types=1);

namespace App\Http\Controllers\UserManagement;

use App\Actions\UserManagement\RegisterUser;
use App\Enums\Users\UserGroup;
use App\Http\Requests\Users\CreateUserRequest;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Post;

final readonly class CreateNewUserController
{
    use AuthorizesRequests;

    #[Get(uri: 'user-management/create', name: 'kiosk.user-management.create')]
    public function create(): Renderable
    {
        $this->authorize(UserPolicy::Create, User::class);

        return view('user-management.create', ['userGroups' => UserGroup::cases()]);
    }

    #[Post(uri: 'user-management/create', name: 'kiosk.user-management.store')]
    public function store(CreateUserRequest $createUserRequest, RegisterUser $registerUser): RedirectResponse
    {
        return redirect()->action(ViewUserController::class, $registerUser->handle($createUserRequest->getData()));
    }
}
