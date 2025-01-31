<?php

namespace App\Listeners\Logs;

use App\Events\Logs\CreateLogEvent;
use App\Repositories\Write\Logs\LogWriteRepositoryInterface;

class CreateLogListener
{
    public function __construct(
        private LogWriteRepositoryInterface $logWriteRepository
    )
    {
    }
    public function handle(CreateLogEvent $event): void
    {
        $data = $event->data;
         $this->logWriteRepository->create($data);
    }
}
