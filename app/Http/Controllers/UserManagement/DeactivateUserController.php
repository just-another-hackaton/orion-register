<?php

declare(strict_types=1);

namespace App\Http\Controllers\UserManagement;

use App\Actions\UserManagement\DeactivateUser;
use App\Http\Requests\Users\DeactivationRequest;
use App\Models\User;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Post;

/**
 * This controller is solely responsible for deactivating and activating users in tghe application.
 * It only implements two mcontroller functions. The Create method is responsible for storing the deactivtion
 * in the system. And the destroy method is responsible for re-enabling the user account.
 *
 * @todo Write documentation for this functionality
 * @todo Write unit tests
 * @todo Implement email verification middleware on the controller
 * @todo Implement the password confirmation view system.
 * @todo Build up the data object.
 */
#[Middleware(middleware: RequirePassword::class)]
final readonly class DeactivateUserController
{
    use AuthorizesRequests;

    #[Get(uri: 'kiosk/user-management/{userEntity}/deactivate', name: 'kiosk.user-management.deactivate')]
    #[Post(uri: 'kiosk/user-management/{userEntity}/deactivate', name: 'kiosk.user-management.deactivate')]
    public function create(DeactivationRequest $request, User $userEntity, DeactivateUser $deactivateUser): RedirectResponse|Renderable
    {
        if ($request->isMethod('GET')) {
            return view('user-management.deactivate', ['user' => $userEntity]);
        }

        $deactivateUser->execute($userEntity, $request->getData());
        return redirect()->action(ViewUserController::class, $userEntity);
    }


    public function destroy(User $user): RedirectResponse
    {
        //
    }
}
