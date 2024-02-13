<?php

namespace App\Providers;

use App\Adapters\{
    MailAdapter,
    UploadAdapter,
    Contracts\MailAdapterContract,
    Contracts\UploadAdapterContract
};

use Illuminate\Support\ServiceProvider;

class AdapterServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            UploadAdapterContract::class,
            UploadAdapter::class
        );

        $this->app->bind(
            MailAdapterContract::class,
            MailAdapter::class
        );
    }

    public function boot(): void
    {
        //
    }
}
