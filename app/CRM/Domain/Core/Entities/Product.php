<?php

declare(strict_types=1);

namespace app\CRM\Domain\Core\Entities;

/**
 * Класс app\CRM\Domain\Core\Entities\Product
 *
 */
final class Product
{
    /**
     * @var string
     */
    private string $name;
    /**
     * @var float
     */
    private float $price;

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

    /**
     * @param  string  $name
     * @param  float  $price
     * app\CRM\Domain\Core\Entities\Product constructor
     */
    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}