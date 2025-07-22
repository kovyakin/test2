<?php

declare(strict_types=1);

namespace App\CRM\Application\Handlers;

use App\CRM\Application\Commands\CreateOrderCommand;
use App\CRM\Domain\Core\Entities\Order;

class CreateOrderHandler
{
    public function __invoke(CreateOrderCommand $command): Order
    {
        return new Order(
            $command->id,
            $command->completed_at,
            $command->created_at,
            $command->customer,
            $command->status,
            $command->warehouse_id
        );
    }
}