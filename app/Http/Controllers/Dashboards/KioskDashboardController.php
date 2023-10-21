<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dashboards;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\RouteAttributes\Attributes\Get;

final readonly class KioskDashboardController
{
    #[Get(
        uri: 'kiosk',
        name: 'kiosk.dashboard'
    )]
    public function __invoke(Request $request): Renderable
    {
        abort_if($request->user()->cannot('access-kiosk'), Response::HTTP_NOT_FOUND);

        return view('dashboards.kiosk');
    }
}
