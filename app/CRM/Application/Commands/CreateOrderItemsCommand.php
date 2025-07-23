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
    public function __construct(?int $id, int $count,  int $order_id, int $product_id)
    {
        $this->id = $id;
        $this->count = $count;
        $this->order_id = $order_id;
        $this->product_id = $product_id;
    }

}