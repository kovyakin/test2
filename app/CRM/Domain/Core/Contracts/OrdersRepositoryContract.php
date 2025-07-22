<?php

declare(strict_types=1);

namespace App\CRM\Domain\Core\Contracts;

use app\CRM\Domain\Core\Entities\Order;
use Illuminate\Support\Collection;

interface OrdersRepositoryContract
{
    public function create(Order $order):void;

    public function getAll(): array;
    public function toArray(Order $orders): Collection;
}