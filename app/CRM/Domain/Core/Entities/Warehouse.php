<?php

declare(strict_types=1);

namespace App\CRM\Domain\Core\Entities;

/**
 * Класс app\CRM\Domain\Core\Entities\Warehouse
 *
 */
final class Warehouse
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param  string  $name
     * app\CRM\Domain\Core\Entities\Warehouse constructor
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function jsonSerialize(): array
    {
        return ['name' => $this->name];
    }
}