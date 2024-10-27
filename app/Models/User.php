<?php

namespace App\Models;

use App\Enum\UserRoleEnum;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cpf',
        'name',
        'email',
        'birth_date',
        'role',
        'zip_code',
        'street',
        'address_number',
        'district',
        'city',
        'uf',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'role' => UserRoleEnum::class,
            'birth_date' => 'date',
            'password' => 'hashed',
        ];
    }
}
