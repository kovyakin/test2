<?php

declare(strict_types=1);

namespace App\CRM\Application\DTOs;

use Illuminate\Support\Arr;

class OrderDTO
{
    public string $customer;
    public string $status;
    public int $warehouse_id;

    /**
     * @param  string  $customer
     * @param  string  $status
     * @param  string  $warehouse_id
     * OrderDTO constructor
     */
    public function __construct(string $customer, string $status, int $warehouse_id)
    {
        $this->customer = $customer;
        $this->status = $status;
        $this->warehouse_id = $warehouse_id;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            (string) Arr::get($data, 'customer'),
            (string) Arr::get($data, 'status'),
            (int) Arr::get($data, 'warehouse_id', 0)
        );
    }
}

