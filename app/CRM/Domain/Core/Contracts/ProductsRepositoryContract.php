<?php

declare(strict_types=1);

namespace App\CRM\Domain\Core\Contracts;

use app\CRM\Domain\Core\Entities\Product;
use Illuminate\Support\Collection;

interface ProductsRepositoryContract
{
    public function getAll(): array;
    public function toArray(Product $products): Collection;
}