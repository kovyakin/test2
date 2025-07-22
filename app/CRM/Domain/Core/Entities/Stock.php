<?php

declare(strict_types=1);

namespace app\CRM\Domain\Core\Entities;

/**
 * Класс app\CRM\Domain\Core\Entities\Stock
 *
 */
final class Stock
{
    /**
     * @var int
     */
    private int $product_id;
    /**
     * @var int
     */
    private int $warehouse_id;
    /**
     * @var int
     */
    private int $stock;

    /**
     * @var null|int
     */
    private int $id;
    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->product_id;
    }

    /**
     * @return int
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * @return int
     */
    public function getWarehouseId(): int
    {
        return $this->warehouse_id;
    }

    /**
     * @param  null|int  $id
     * @param  int  $product_id
     * @param  int  $stock
     * @param  int  $warehouse_id
     * Stock constructor
     */
    public function __construct(?int $id, int $product_id, int $stock, int $warehouse_id)
    {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->stock = $stock;
        $this->warehouse_id = $warehouse_id;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'stock' => $this->stock,
            'warehouse_id' => $this->warehouse_id,
        ];
    }

}