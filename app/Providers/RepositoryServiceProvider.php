<?php

namespace App\Providers;

use App\Repositories\Write\Balances\BalancesWriteRepository;
use App\Repositories\Write\Balances\BalancesWriteRepositoryInterface;
use App\Repositories\Write\Logs\LogWriteRepository;
use App\Repositories\Write\Logs\LogWriteRepositoryInterface;
use App\Repositories\Write\Users\UserWriteRepository;
use App\Repositories\Write\Users\UserWriteRepositoryInterface;
use Carbon\Laravel\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(
            UserWriteRepositoryInterface::class,
            UserWriteRepository::class
        );

        $this->app->bind(
            BalancesWriteRepositoryInterface::class,
            BalancesWriteRepository::class
        );

        $this->app->bind(
            LogWriteRepositoryInterface::class,
            LogWriteRepository::class
        );
    }
}
