<?php

namespace App\Providers;

use App\Events\Logs\CreateLogEvent;
use App\Listeners\Logs\CreateLogListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        CreateLogEvent::class => [
            CreateLogListener::class,
        ]
    ];
}
