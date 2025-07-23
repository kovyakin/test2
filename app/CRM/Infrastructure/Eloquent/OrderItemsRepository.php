<?php

declare(strict_types=1);

namespace App\CRM\Infrastructure\Eloquent;

use App\CRM\Application\DTOs\OrderItemDTO;
use App\CRM\Domain\Core\Contracts\OrderItemsRepositoryContract;
use App\CRM\Domain\Core\Entities\OrderItems;
use App\Models\OrderItems as EloquentOrderItems;

class OrderItemsRepository implements OrderItemsRepositoryContract
{

    public function create(OrderItems $orderItems): void
    {
        EloquentOrderItems::query()->create($orderItems->toArray());
    }

    public function update(OrderItems $orderItems, array $data): OrderItems
    {
        // TODO: Implement update() method.
    }
}