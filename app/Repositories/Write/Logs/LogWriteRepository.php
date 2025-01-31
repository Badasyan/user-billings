<?php

namespace App\Repositories\Write\Logs;

use App\Models\Logs\Log;
use Illuminate\Database\Eloquent\Builder;

class LogWriteRepository implements LogWriteRepositoryInterface
{
    public function query(): Builder
    {
        return Log::query();
    }

    public function create(array $data): Log
    {
        return $this->query()->create($data);
    }
}
