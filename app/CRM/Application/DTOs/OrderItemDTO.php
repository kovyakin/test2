<?php

declare(strict_types=1);

namespace App\CRM\Application\DTOs;

use Illuminate\Support\Arr;

class OrderItemDTO
{
    public int $order_id;

    public int $product_id;

    public int $count;

    /**
     * @param  int  $count
     * @param  int  $order_id
     * @param  int  $product_id
     * OrderItemDTO constructor
     */
    public function __construct(int $order_id, int $product_id, int $count)
    {
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->count = $count;
    }


    public static function fromArray(array $data): self
    {
        return new self(
            (int) Arr::get($data, 'order_id'),
            (int) Arr::get($data, 'product_id'),
            (int) Arr::get($data, 'count')
        );
    }
}