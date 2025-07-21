<?php

declare(strict_types=1);

namespace app\CRM\Domain\Core\Entities;

/**
 * Класс app\CRM\Domain\Core\Entities\Product
 *
 */
final class Product
{
    private ?int  $id;
    /**
     * @var string
     */
    private string $name;
    /**
     * @var float
     */
    private float $price;

    /**
     * @param  int|null  $id
     * @param  string  $name
     * @param  float  $price
     * Product constructor
     */
    public function __construct(?int $id, string $name, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }



    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
        ];
    }
}