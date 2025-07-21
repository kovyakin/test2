<?php

declare(strict_types=1);

namespace App\CRM\Infrastructure\Eloquent;

use App\CRM\Domain\Core\Contracts\WarehousesRepositoryContract;
use App\CRM\Domain\Core\Entities\Warehouse;
use App\Models\Warehouse as EloquentWarehouse;
use Illuminate\Support\Collection;

class WarehousesRepository implements WarehousesRepositoryContract
{
    public function getAll(): array
    {
        $warehouses = EloquentWarehouse::all();

        return $warehouses->map(function (EloquentWarehouse $warehouse) {
            return new Warehouse($warehouse->id, $warehouse->name);
        })->all();
    }

    public function toArray(Warehouse $warehouses): Collection
    {
        $collect = collect();

        foreach ($warehouses as $warehouse) {
            $collect->push($warehouse->jsonSerialize());
        }

        return $collect;
    }
}