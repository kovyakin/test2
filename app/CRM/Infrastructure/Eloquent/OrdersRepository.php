<?php

declare(strict_types=1);

namespace App\CRM\Infrastructure\Eloquent;

use App\CRM\Domain\Core\Contracts\OrdersRepositoryContract;
use app\CRM\Domain\Core\Entities\Order;
use Illuminate\Support\Collection;
use App\Models\Order as EloquentOrder;


class OrdersRepository implements OrdersRepositoryContract
{
    public function getAll(): array
    {
        $orders = EloquentOrder::all();

        return $orders->map(function (EloquentOrder $order) {
            return new Order(
                $order->completed_at,
                $order->created_at,
                $order->customer,
                $order->status,
                $order->warehouse_id
            );
        })->all();
    }

    public function toArray(Order $orders): Collection
    {
        $collect = collect();

        foreach ($orders as $order) {
            $collect->push($order->jsonSerialize());
        }

        return $collect;
    }
}