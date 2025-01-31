<?php

namespace App\Repositories\Write\Users;

use App\Models\Users\User;

interface UserWriteRepositoryInterface
{

    public function create(array $data): User;
}
