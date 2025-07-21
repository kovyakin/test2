<?php

declare(strict_types=1);

namespace app\CRM\Domain\Core\Entities;

/**
 * Класс app\CRM\Domain\Core\Entities\Order
 *
 */
final class Order
{
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
     * @var int
     */
    private int $warehouse_id;
    /**
     * @var string
     */
    private string $completed_at;
    /**
     * @var string
     */
    private string $status;

    /**
     * @param  string  $completed_at
     * @param  string  $customer
     * @param  string  $status
     * @param  int  $warehouse_id
     * app\CRM\Domain\Core\Entities\Order constructor
     */
    public function __construct(string $completed_at, string $customer, string $status, int $warehouse_id)
    {
        $this->completed_at = $completed_at;
        $this->customer = $customer;
        $this->status = $status;
        $this->warehouse_id = $warehouse_id;
    }

}