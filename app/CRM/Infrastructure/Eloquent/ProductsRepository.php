<?php

declare(strict_types=1);

namespace App\CRM\Infrastructure\Eloquent;

use App\CRM\Domain\Core\Contracts\ProductsRepositoryContract;
use app\CRM\Domain\Core\Entities\Product;
use Illuminate\Support\Collection;
use App\Models\Product as EloquentProduct;

class ProductsRepository implements ProductsRepositoryContract
{

    public function getAll(): array
    {
        $products = EloquentProduct::all();

        return $products->map(function (EloquentProduct $product) {
            return new Product($product->id,$product->name,$product->price);
        })->all();
    }

    public function toArray(Product $products): Collection
    {
        $collect = collect();

        foreach ($products as $product) {
            $collect->push($product->jsonSerialize());
        }

        return $collect;
    }
}