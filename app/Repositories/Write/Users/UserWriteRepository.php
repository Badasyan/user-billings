<?php

namespace App\Repositories\Write\Users;

use App\Models\Balances\Balance;
use App\Models\Users\User;
use App\Repositories\Write\Balances\BalancesWriteRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class UserWriteRepository implements UserWriteRepositoryInterface
{
    public function query(): Builder
    {
        return User::query();
    }

    public function create(array $data): User
    {
        $user = $this->query()->create($data);
        $token  = $user->createToken('auth_token')->accessToken;

        return $user->setAttribute('token', $token);

    }
}
