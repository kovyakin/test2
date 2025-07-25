<?php

declare(strict_types=1);

namespace App\CRM\Domain\Core\Contracts;

use App\CRM\Domain\Core\Entities\Warehouse;
use Illuminate\Support\Collection;

interface WarehousesRepositoryContract
{
    public function getAll(): array;

    public function toArray(Warehouse $warehouses): Collection;
}