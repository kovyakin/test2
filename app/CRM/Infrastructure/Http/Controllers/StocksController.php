<?php

namespace App\CRM\Infrastructure\Http\Controllers;

use App\CRM\Infrastructure\Eloquent\CalculateRepository;
use App\CRM\Infrastructure\Http\Resources\WarehouseProductsResource;
use App\Http\Controllers\Controller;

class StocksController extends Controller
{
    public function __construct(
        private readonly CalculateRepository $repository
    ) {
    }

    public function __invoke()
    {
        $warehouseProducts = $this->repository->getWarehouses()->getStocks()->getProducts()->getResult();

        return WarehouseProductsResource::collection($warehouseProducts);
    }
}
