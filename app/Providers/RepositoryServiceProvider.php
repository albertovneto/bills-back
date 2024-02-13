<?php

namespace App\Providers;

use App\Repositories\{
    BillsRepository,
    BillsFileRepository,
    Contracts\BillsFileRepositoryContract,
    Contracts\BillsRepositoryContract,
};
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            BillsFileRepositoryContract::class,
            BillsFileRepository::class
        );

        $this->app->bind(
            BillsRepositoryContract::class,
            BillsRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}
