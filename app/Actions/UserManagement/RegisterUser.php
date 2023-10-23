<?php

declare(strict_types=1);

namespace App\Actions\UserManagement;

use App\DataObjects\UserDataObject;
use App\Models\User;
use Illuminate\Support\Facades\DB;

final class RegisterUser
{
    public function handle(UserDataObject $userDataObject): User
    {
        return DB::transaction(
            fn (): User => User::query()->create($userDataObject->toArray())
        );
    }
}
