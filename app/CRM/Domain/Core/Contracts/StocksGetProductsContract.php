<?php

declare(strict_types=1);

namespace App\CRM\Domain\Core\Contracts;

interface StocksGetProductsContract
{
    public function getProducts(): array;
}