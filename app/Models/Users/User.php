<?php

namespace App\Models\Users;

use App\Models\Balances\Balance;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        'name',
        'age',
        'phone',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function balance(): HasOne
    {
        return $this->hasOne(
            Balance::class,
            'user_id',
            'id'
        );
    }

}
