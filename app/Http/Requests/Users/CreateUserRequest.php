<?php

declare(strict_types=1);

namespace App\Http\Requests\Users;

use App\DataObjects\UserDataObject;
use App\Enums\Users\UserGroup;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Support\BasePolicy;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
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
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'user_group' => ['required', 'string', 'max:255', new Enum(UserGroup::class)],
        ];
    }
}
