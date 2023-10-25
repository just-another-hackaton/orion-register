<?php

declare(strict_types=1);

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

final class DeactivationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('deactivate', $this->userEntity);
    }

    public function rule(): array
    {
        // If request is an GET request. Just return empty validation rules
        // Becasue we are only displaying a view, and don't need any validation rules.
        if ($this->isMethod('GET')) {
            return [];
        }

        // If the request is an POSt request. We need to confirm that there is an deactivation reason given.
        return ['reason' => ['required', 'string']];
    }
}
