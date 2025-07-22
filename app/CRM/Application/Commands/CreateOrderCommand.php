<?php

declare(strict_types=1);

namespace App\CRM\Application\Commands;

class CreateOrderCommand
{
    public ?int $id;

    public ?string $completed_at;

    public ?string $created_at;

    public string $customer;

    public string $status;

    public int $warehouse_id;

    /**
     * @param  null|string  $completed_at
     * @param  null|string  $created_at
     * @param  string  $customer
     * @param  null|int  $id
     * @param  string  $status
     * @param  int  $warehouse_id
     * CreateOrderCommand constructor
     */
    public function __construct(
        ?string $completed_at,
        ?string $created_at,
        string $customer,
        ?int $id,
        string $status,
        int $warehouse_id
    ) {
        $this->completed_at = $completed_at;
        $this->created_at = $created_at;
        $this->customer = $customer;
        $this->id = $id;
        $this->status = $status;
        $this->warehouse_id = $warehouse_id;
    }


}