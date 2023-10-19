<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Naming\Rector\ClassMethod\RenameParamToMatchTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/bootstrap',
        __DIR__ . '/config',
        __DIR__ . '/public',
        __DIR__ . '/resources',
        __DIR__ . '/routes',
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ]);

    $rectorConfig->rules([
        // Genral conding style rules
        \Rector\Php74\Rector\Closure\ClosureToArrowFunctionRector::class,
        \Rector\Naming\Rector\ClassMethod\RenameParamToMatchTypeRector::class,

        // Laravel specific rules
        \RectorLaravel\Rector\MethodCall\RedirectRouteToToRouteHelperRector::class,

        // PHP 8.2 related rules
        \Rector\Php82\Rector\Param\AddSensitiveParameterAttributeRector::class,
        \Rector\Php81\Rector\Property\ReadOnlyPropertyRector::class,
        \Rector\Php82\Rector\Class_\ReadOnlyClassRector::class,
    ]);


    // Skipped directories and files
    $rectorConfig->skip([
        // Controller is skipped due to the fact that we can't ensure that it works due to the missing unit tests.
        RenameParamToMatchTypeRector::class => [
            __DIR__ . '/src/App/Admin/Users/Controllers/DeactivationController.php',
        ],
    ]);
};
