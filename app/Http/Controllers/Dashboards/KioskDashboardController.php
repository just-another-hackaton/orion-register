<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dashboards;

use Illuminate\Contracts\Support\Renderable;
use Spatie\RouteAttributes\Attributes\Get;

final readonly class KioskDashboardController
{
    #[Get(uri: 'kiosk', name: 'kiosk.dashboard')]
    public function __invoke(): Renderable
    {
        //
    }
}
