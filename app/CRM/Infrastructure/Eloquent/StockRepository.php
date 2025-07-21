<?php

declare(strict_types=1);

namespace App\CRM\Infrastructure\Eloquent;

use App\CRM\Domain\Core\Contracts\StocksRepositoryContract;
use app\CRM\Domain\Core\Entities\Stock;
use App\CRM\Domain\Core\Entities\Warehouse;
use Illuminate\Support\Collection;
use App\Models\Stock as EloquentStock;

class StockRepository implements StocksRepositoryContract
{


    public function getAll(): array
    {
        $stocks = EloquentStock::all();

        return $stocks->map(function (EloquentStock $stock) {
            return new Stock($stock->product_id, $stock->stock, $stock->warehouse_id);
        })->all();
    }

    public function toArray(Stock $stocks): Collection
    {
        $collect = collect();

        foreach ($stocks as $stock) {
            $collect->push($stock->jsonSerialize());
        }

        return $collect;
    }

    public function getAllWarehouses(int $warehouseId): array
    {
        $stocksWarehouse = EloquentStock::query()->where('warehouse_id', $warehouseId)->get();

        return $stocksWarehouse->map(function (EloquentStock $stock) {
            return new Stock($stock->product_id, $stock->stock, $stock->warehouse_id);
        })->all();
    }
}