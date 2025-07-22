<?php

namespace app\CRM\Domain\Core\Providers;

use App\CRM\Application\Services\OrderService;
use App\CRM\Application\Services\StocksGetProductsService;
use App\CRM\Application\Services\WarehouseGeaAllService;
use App\CRM\Domain\Core\Contracts\OrderContract;
use App\CRM\Domain\Core\Contracts\OrdersRepositoryContract;
use App\CRM\Domain\Core\Contracts\ProductsRepositoryContract;
use App\CRM\Domain\Core\Contracts\StocksGetProductsContract;
use App\CRM\Domain\Core\Contracts\StocksRepositoryContract;
use App\CRM\Domain\Core\Contracts\WarehouseGetAllContract;
use App\CRM\Domain\Core\Contracts\WarehousesRepositoryContract;
use App\CRM\Infrastructure\Eloquent\OrdersRepository;
use App\CRM\Infrastructure\Eloquent\ProductsRepository;
use App\CRM\Infrastructure\Eloquent\StockRepository;
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

        $this->app->bind(ProductsRepositoryContract::class, ProductsRepository::class);

        $this->app->bind(OrdersRepositoryContract::class, OrdersRepository::class);

        $this->app->bind(StocksRepositoryContract::class, StockRepository::class);

        $this->app->bind(StocksGetProductsContract::class, StocksGetProductsService::class);

        $this->app->bind(OrderContract::class, OrderService::class);
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
            WarehouseGetAllContract::class,
            ProductsRepositoryContract::class,
            OrdersRepositoryContract::class,
            StocksRepositoryContract::class,
            OrderContract::class,
        ];
    }
}
