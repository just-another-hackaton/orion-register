<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Naming\Rector\ClassMethod\RenameParamToMatchTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/routes',
        __DIR__ . '/app',
        __DIR__ . '/database',
        __DIR__ . '/tests',
    ]);

    $rectorConfig->rules([
        // Genral conding style rules
        \Rector\Php74\Rector\Closure\ClosureToArrowFunctionRector::class,
        \Rector\Naming\Rector\ClassMethod\RenameParamToMatchTypeRector::class,

        // PHP 8.2 related rules
        \Rector\Php82\Rector\Param\AddSensitiveParameterAttributeRector::class,
        \Rector\Php81\Rector\Property\ReadOnlyPropertyRector::class,
        \Rector\Php82\Rector\Class_\ReadOnlyClassRector::class,
    ]);
};
