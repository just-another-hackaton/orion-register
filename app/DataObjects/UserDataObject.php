<?php

declare(strict_types=1);

namespace App\DataObjects;

use Spatie\LaravelData\Data;

final class UserDataObject extends Data
{
    public function __construct(
        public readonly string $firstname,
        public readonly string $lastname,
        public readonly string $email,
        public readonly string $user_group,
    ) {}
}
