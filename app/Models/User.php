<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\Users\UserGroup;
use App\Models\Concerns\UserGroupMethods;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use UserGroupMethods;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'last_seen_at',
        'last_login_ip',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function name(): Attribute
    {
        return Attribute::get(function (): string {
            return ucfirst("{$this->firstname} {$this->lastname}");
        });
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'user_group' => UserGroup::class,
        'email_verified_at' => 'datetime',
        'last_seen_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isOnline(): bool
    {
        return Cache::has('user-is-online-' . $this->id);
    }
}
