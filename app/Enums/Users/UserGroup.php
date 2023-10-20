<?php

declare(strict_types=1);

namespace App\Enums\Users;

enum UserGroup: string
{
    case User = 'normal user';
    case Researcher = 'researcher';
    case Administrator = 'administrator';
    case Webmaster = 'webmaster';
}
