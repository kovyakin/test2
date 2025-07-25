<?php

namespace App\Providers;

use App\CRM\Domain\Core\Providers\CrmProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(CrmProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


    }

}
