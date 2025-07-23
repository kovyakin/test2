<?php

declare(strict_types=1);

namespace App\CRM\Application\Handlers;

use App\CRM\Application\Commands\CreateOrderItemsCommand;
use App\CRM\Domain\Core\Entities\OrderItems;

class OrderItemsHandler
{
    public function __invoke(CreateOrderItemsCommand $command): OrderItems
    {
        return new OrderItems(
            $command->id,
            $command->order_id,
            $command->product_id,
            $command->count
        );
    }
}
