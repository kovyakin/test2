<?php

declare(strict_types=1);

namespace App\CRM\Infrastructure\Eloquent;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class CalculateRepository
{
    private Collection $warehouses;
    private Collection $stocks;
    private Collection $products;
    private Collection $array;

    public function __construct(
        private readonly WarehousesRepository $warehousesRepository,
        private readonly StockRepository $stockRepository,
        private readonly ProductsRepository $productsRepository
    ) {
        $this->warehouses = collect();
        $this->stocks = collect();
        $this->products = collect();
    }

    public function getWarehouses(): self
    {
        $warehouses = $this->warehousesRepository->getAll();

        foreach ($warehouses as $warehouse) {
            $this->warehouses->push($warehouse->jsonSerialize());
        }

        return $this;
    }

    public function getStocks(): self
    {
        $stocks = $this->stockRepository->getAll();

        foreach ($stocks as $stock) {
            $this->stocks->push($stock->jsonSerialize());
        }

        return $this;
    }

    public function getProducts(): self
    {
        $products = $this->productsRepository->getAll();

        foreach ($products as $product) {
            $this->products->push($product->jsonSerialize());
        }

        return $this;
    }

    public function getResult(): Collection
    {
        $modifiedStocks = $this->modifiedStocks();

        return  $this->modifiedWarehouse($modifiedStocks);

    }

    private function modifiedStocks(): Collection
    {
        return $this->stocks->map(function ($item) {
            return [
                'id' => $item['id'],
                'stock' => $item['stock'],
                'warehouse_id' => $item['warehouse_id'],
                'products' => $this->products->filter(function ($product) use ($item) {
                    return $product['id'] == $item['product_id'];
                })->values()->all(),
            ];
        });
    }

    private function modifiedWarehouse(Collection $modifiedStocks): Collection
    {
        return $this->warehouses->map(function ($item) use ($modifiedStocks) {
            return [
                'id' => $item['id'],
                'name' => $item['name'],
                'stocks' => $modifiedStocks->filter(function ($stock) use ($item) {
                    return $stock['warehouse_id'] == $item['id'];
                })->map(function ($stock) {
                    return Arr::except($stock, ['warehouse_id']);
                })->values()->all(),
            ];
        });
    }
}