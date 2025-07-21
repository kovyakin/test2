<?php

declare(strict_types=1);

namespace App\CRM\Application\Services;

use App\CRM\Domain\Core\Contracts\WarehouseGetAllContract;
use App\CRM\Domain\Core\Contracts\WarehousesRepositoryContract;
use App\CRM\Infrastructure\Http\Resources\WarehouseResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

readonly class WarehouseGeaAllService implements WarehouseGetAllContract
{

    public function __construct(
        private WarehousesRepositoryContract $warehousesRepository
    ) {
    }
    public function execute():AnonymousResourceCollection
    {
       return   WarehouseResource::collection($this->warehousesRepository->getAll());
    }

}