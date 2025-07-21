<?php

namespace app\CRM\Domain\Core\Providers;

use App\CRM\Application\Services\WarehouseGeaAllService;
use App\CRM\Domain\Core\Contracts\WarehouseGetAllContract;
use App\CRM\Domain\Core\Contracts\WarehousesRepositoryContract;
use App\CRM\Infrastructure\Eloquent\WarehousesRepository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;


class CrmProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(WarehousesRepositoryContract::class, WarehousesRepository::class);
        $this->app->bind(WarehouseGetAllContract::class, WarehouseGeaAllService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        require app_path('/CRM/Domain/Routes/crm.php');
    }

    public function provides(): array
    {
        return [
            WarehousesRepositoryContract::class,
            WarehouseGetAllContract::class
        ];
    }
}
