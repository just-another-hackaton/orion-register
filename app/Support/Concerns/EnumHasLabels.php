<?php

declare(strict_types=1);

namespace App\Support\Concerns;

interface EnumHasLabels
{
    /**
     * Method for determining the CSS class for the user group.
     */
    public function getLabelClass(): string;

    /**
     * Method for determing the label text for the user group.
     */
    public function getLabelText(): string;
}
