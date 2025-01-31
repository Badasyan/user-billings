<?php

namespace App\Repositories\Write\Logs;

use App\Models\Logs\Log;

interface LogWriteRepositoryInterface
{
    public function create(array $data): Log;
}
