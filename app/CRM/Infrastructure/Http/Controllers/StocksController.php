<?php

namespace App\CRM\Infrastructure\Http\Controllers;

use App\CRM\Infrastructure\Eloquent\ProductsRepository;
use App\CRM\Infrastructure\Eloquent\StockRepository;
use App\CRM\Infrastructure\Eloquent\WarehousesRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class StocksController extends Controller
{
    public function __construct(
        private readonly StockRepository $stockRepository,
        private readonly WarehousesRepository $warehousesRepository,
        private readonly ProductsRepository $productsRepository
    ) {
    }

    public function __invoke()
    {
        $stocks = $this->stockRepository->getAll();
//dd($stocks[0]->jsonSerialize());
//        $a = Arr::where($stocks, function ($value, $key) {
//            return $value->j;
//        });
//        dd($a);
//        $a = collect();
//        foreach ($stocks as $stock) {
//            if($stock->getWarehouseId() == 1){
//                $a->push($stock);
//            }
//        }
//dd($a);
        $products = $this->productsRepository->getAll();

        $warehouses = $this->warehousesRepository->getAll();

        $data = collect();

        foreach ($warehouses as $warehouse) {

            $warehouseStocks = collect($stocks)
                ->filter(fn($stock) => $stock->jsonSerialize()['warehouse_id'] === $warehouse->jsonSerialize()['id'])
                ->map(fn($stock) => $stock->jsonSerialize());

            $warehouseProducts = collect();
            foreach ($warehouseStocks as $stock) {
                $product = collect($products)
                    ->first(fn($p) => $p->jsonSerialize()['id'] === $stock['product_id']);

                if ($product) {
                    $warehouseProducts->push($product->jsonSerialize());
                }
            }

            $data->push([
                'warehouse' => $warehouse,
                'stocks' => $warehouseStocks->values()->all(),
                'products' => $warehouseProducts->values()->all()
            ]);
        }

dd($data);
}
}
