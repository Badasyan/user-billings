<?php

namespace App\Repositories\Write\Balances;

use App\Models\Balances\Balance;
use Illuminate\Database\Eloquent\Builder;

class BalancesWriteRepository implements BalancesWriteRepositoryInterface
{
    public function query(): Builder
    {
        return Balance::query();
    }

    public function create(int $userId): Balance
    {
        return $this->query()->create(['user_id' => $userId]);
    }

    public function fill(array $data): bool
    {
        return $this->query()->where('user_id', $data['user_id'])->update($data);
    }
}
