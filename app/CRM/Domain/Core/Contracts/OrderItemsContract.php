<?php

declare(strict_types=1);

namespace App\CRM\Domain\Core\Contracts;

use App\CRM\Application\DTOs\OrderItemDTO;
use App\CRM\Domain\Core\Entities\OrderItems;
use App\CRM\Infrastructure\Http\Requests\OrderItemsRequest;

interface OrderItemsContract
{
    public function add(OrderItemDTO $dto): void;

    public function update(OrderItemsRequest $orderItemsRequest): OrderItems;
}