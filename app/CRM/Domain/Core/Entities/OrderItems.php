<?php

declare(strict_types=1);

namespace App\CRM\Domain\Core\Entities;

use App\CRM\Domain\Core\Events\AddOrderItems;

class OrderItems
{
    public ?int $id;
    public int $order_id;

    public int $product_id;

    public int $count;

    /**
     * @param  int  $count
     * @param  int  $id
     * @param  int  $order_id
     * @param  int  $product_id
     * OrderItems constructor
     */
    public function __construct(?int $id, int $order_id, int $product_id, int $count)
    {
        $this->id = $id;
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->count = $count;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getOrderId(): int
    {
        return $this->order_id;
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'count' => $this->count,
        ];
    }

    public function add(
        ?int $id,
        int $order_id,
        int $product_id,
        int $count
    ): self {
        $orderItem = new self(
            $id,
            $order_id,
            $product_id,
            $count
        );

        event(new AddOrderItems($orderItem));

        return $orderItem;
    }
}