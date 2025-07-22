<?php

declare(strict_types=1);

namespace App\CRM\Domain\Core\Contracts;

use App\CRM\Application\DTOs\OrderDTO;
use App\CRM\Domain\Core\Entities\Order;

interface OrderContract
{
    public function create(OrderDTO $dto): void;

    public function update(Order $order, array $data): Order;

    public function complete(Order $order): void;

    public function cancel(Order $order): void;

    public function restore(Order $order): void;
}