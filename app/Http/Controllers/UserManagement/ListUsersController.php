<?php

declare(strict_types=1);

namespace App\Http\Controllers\UserManagement;

use App\Enums\Users\UserGroup;
use App\Models\User;
use App\Policies\UserPolicy;
use App\Queries\Users\ListUsersQuery;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;

/**
 * @todo Needs testing
 */
final readonly class ListUsersController
{
    use AuthorizesRequests;

    #[Get(uri: 'kiosk/user-management', name: 'kiosk.user-management.index')]
    public function __invoke(Request $request, ListUsersQuery $listUsersQuery): Renderable
    {
        $this->authorize(UserPolicy::ViewAny, User::class);

        return view('user-management.index', [
            'filterCriterias' => UserGroup::filterCriterias(),
            'users' => $listUsersQuery->get()
        ]);
    }
}
