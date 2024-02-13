<?php

namespace App\Providers;

use App\Services\{
    Contract\BillsFileServiceContract,
    Contract\ProcessBillsServiceContract,
    Contract\UploadServiceContract,
    ProcessBillsService,
    UploadService,
    BillsFileService
};

use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            BillsFileServiceContract::class,
            BillsFileService::class
        );

        $this->app->bind(
            UploadServiceContract::class,
            UploadService::class
        );

        $this->app->bind(
            ProcessBillsServiceContract::class,
            ProcessBillsService::class
        );
    }

    public function boot(): void
    {
        //
    }
}
