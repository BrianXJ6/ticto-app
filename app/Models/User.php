<?php

namespace App\Models;

use App\Enum\UserRoleEnum;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'cpf',
        'name',
        'email',
        'birth_date',
        'position',
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
            'user_id' => 'integer',
            'role' => UserRoleEnum::class,
            'birth_date' => 'date',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the points for the user.
     */
    public function points(): HasMany
    {
        return $this->hasMany(Point::class);
    }

    /**
     * Get the employees for the user.
     */
    public function employees(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
