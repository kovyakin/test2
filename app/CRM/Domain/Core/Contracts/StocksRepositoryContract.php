<?php

declare(strict_types=1);

namespace App\CRM\Domain\Core\Contracts;

use app\CRM\Domain\Core\Entities\Stock;
use Illuminate\Support\Collection;

interface StocksRepositoryContract
{
    public function getAll(): array;

    public function toArray(Stock $stocks): Collection;
    public function getAllWarehouses(int $warehouseId): array;
}