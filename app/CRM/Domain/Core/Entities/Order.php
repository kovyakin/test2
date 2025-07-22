<?php

declare(strict_types=1);

namespace App\CRM\Domain\Core\Entities;

/**
 * Класс app\CRM\Domain\Core\Entities\Order
 *
 */
final class Order
{
    /**
     * @var int
     */
    private int $id;
    /**
     * @var int
     */
    private int $warehouse_id;
    /**
     * @var string
     */
    private ?string $completed_at;
    /**
     * @var string
     */
    private ?string $status;

    /**
     * @var string
     */
    private ?string $created_at;

    /**
     * @param  string  $completed_at
     * @param  string  $created_at
     * @param  string  $customer
     * @param  string  $status
     * @param  int  $warehouse_id
     * Order constructor
     */
    public function __construct(
        ?int $id,
        ?string $completed_at,
        ?string $created_at,
        string $customer,
        ?string $status,
        int $warehouse_id
    ) {
        $this->id = $id;
        $this->completed_at = $completed_at;
        $this->created_at = $created_at;
        $this->customer = $customer;
        $this->status = $status;
        $this->warehouse_id = $warehouse_id;
    }

    /**
     * @return string
     */
    public function getCompletedAt(): string
    {
        return $this->completed_at;
    }

    /**
     * @return string
     */
    public function getCustomer(): string
    {
        return $this->customer;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getWarehouseId(): int
    {
        return $this->warehouse_id;
    }

    /**
     * @var string
     */
    private string $customer;

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function customer(string $customer): ?self
    {
        if ($this->customer === $customer) {
            return $this;
        }
        return null;
    }

    public function status(string $status): ?self
    {
        if ($this->status === $status) {
            return $this;
        }
        return null;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'completed_at' => $this->completed_at,
            'customer' => $this->customer,
            'status' => $this->status,
            'warehouse_id' => $this->warehouse_id,
            'created_at' => $this->created_at,
        ];
    }
}