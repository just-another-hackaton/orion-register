<?php

declare(strict_types=1);

namespace App\Enums\Users;

use App\Support\Concerns\EnumHasLabels;
use Illuminate\Support\Collection;

enum UserGroup: string implements EnumHasLabels
{
    case User = 'normal user';
    case Researcher = 'researcher';
    case Administrator = 'administrator';
    case Webmaster = 'webmaster';

    public function getLabelClass(): string
    {
        return match ($this) {
            self::User => 'label-user',
            self::Researcher => 'label-researcher',
            self::Administrator => 'label-administrator',
            self::Webmaster => 'label-webmaster',
            default => 'badge-unknown',
        };
    }

    public function getLabelText(): string
    {
        return match ($this) {
            self::User => trans('User'),
            self::Researcher => trans('Researcher'),
            self::Administrator => trans('Administrator'),
            self::Webmaster => trans('Webmaster'),
            default => trans('unknown'),
        };
    }

    public static function filterCriterias(): Collection
    {
        return collect([
            ['name' => Self::User->name, 'value' => self::User->value],
            ['name' => Self::Researcher->name, 'value' => self::Researcher->value],
            ['name' => Self::Administrator->name, 'value' => self::Administrator->value],
            ['name' => Self::Webmaster->name, 'value' => self::Webmaster->value],
        ]);
    }
}
