<?php

declare(strict_types=1);

namespace  App\Http\Controllers\Dashboards;

use Illuminate\Contracts\Support\Renderable;
use Spatie\RouteAttributes\Attributes\Get;

final readonly class DashboardController
{
    #[Get(
        uri: '/',
        name: 'welcome'
    )]
    public function __invoke(): Renderable
    {
        return view('welcome');
    }
}
