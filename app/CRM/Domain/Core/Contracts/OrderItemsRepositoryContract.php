<?php

declare(strict_types=1);

namespace App\CRM\Domain\Core\Contracts;

use App\CRM\Application\DTOs\OrderItemDTO;
use App\CRM\Domain\Core\Entities\OrderItems;

interface OrderItemsRepositoryContract
{
    public function create(OrderItems $orderItems): void;

    public function update(OrderItems $orderItems, array $data): OrderItems;
}