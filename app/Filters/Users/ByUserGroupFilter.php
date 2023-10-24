<?php

declare (strict_types=1);

namespace App\Filters\Users;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

final readonly class ByUserGroupFilter
{
    public function __construct(
        public readonly Request $request
    ) {}

    public function handle(Builder $builder, Closure $closure): Builder
    {
        return $closure($builder)->when($this->request->has('filter'), function (Builder $builder): Builder {
            $filterCriteria = $this->request->get('filter');

            return match ($filterCriteria) {
                'webmaster', 'normal user', 'researcher', 'administrator' => $builder->where('user_group', $filterCriteria),
                default => $builder,
            };
        });
    }
}
