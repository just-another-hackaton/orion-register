<?php

declare(strict_types=1);

namespace App\Http\Controllers\Account;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;

final readonly class InformationSettingsController
{
    #[Get(uri: 'account/information', name: 'account.settings.information')]
    public function __invoke(Request $request): Renderable
    {
        return view('account.user-information-settings', ['user' => $request->user()]);
    }
}
