<?php

declare(strict_types=1);

namespace App\CRM\Application\Commands;

class CreateOrderItemsCommand
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
     * CreateOrderItemsCommand constructor
     */
    public function __construct(?int $id, int $order_id, int $product_id, int $count,)
    {
        $this->id = $id;
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->count = $count;
    }

}