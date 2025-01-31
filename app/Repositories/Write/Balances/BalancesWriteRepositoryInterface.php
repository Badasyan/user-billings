<?php

namespace App\Repositories\Write\Balances;

use App\Models\Balances\Balance;

interface BalancesWriteRepositoryInterface
{
    public function create(int $userId): Balance;
    public function fill(array $data): bool;
}
