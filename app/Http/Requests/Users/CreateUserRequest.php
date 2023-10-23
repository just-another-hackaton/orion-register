<?php

declare(strict_types=1);

namespace App\Http\Requests\Users;

use App\DataObjects\UserDataObject;
use App\Models\User;
use App\Policies\UserPolicy;
use App\Support\BasePolicy;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\LaravelData\WithData;

final class CreateUserRequest extends FormRequest
{
    use WithData;

    protected string $dataClass = UserDataObject::class;

    public function authorize(): bool
    {
        return $this->user()->can(BasePolicy::Create, User::class);
    }

    public function rules(): array
    {
        return [

        ];
    }
}
