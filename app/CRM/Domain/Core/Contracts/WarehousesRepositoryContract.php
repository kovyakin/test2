<?php

declare(strict_types=1);

namespace App\CRM\Domain\Core\Contracts;

interface WarehousesRepositoryContract
{
    public function getAll(): array;
}