<?php

declare(strict_types=1);

namespace App\Queries\Users;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Pipeline;

final readonly class ListUsersQuery
{
    public function get(): LengthAwarePaginator
    {
        return Pipeline::send(User::query())
            ->through([
                \App\Filters\Users\ByUserGroupFilter::class,
            ])
            ->thenReturn()
            ->paginate();
    }
}
