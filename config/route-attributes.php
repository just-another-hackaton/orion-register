<?php

return [
    /*
     *  Automatic registration of routes will only happen if this setting is `true`
     */
    'enabled' => true,

    /*
     * Controllers in these directories that have routing attributes
     * will automatically be registered.
     *
     * Optionally, you can specify group configuration by using key/values
     */
    'directories' => [
        app_path('Http/Controllers/Dashboards'),
        app_path('Http/Controllers/UserManagement'),
    ],

    /**
     * This middleware will be applied to all routes.
     */
    'middleware' => [
        'web',
        \App\Http\Middleware\Authenticate::class,
        \Cog\Laravel\Ban\Http\Middleware\ForbidBannedUser::class,
    ]
];
