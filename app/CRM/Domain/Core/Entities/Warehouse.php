<?php

declare(strict_types=1);

namespace App\CRM\Domain\Core\Entities;

/**
 * Класс app\CRM\Domain\Core\Entities\Warehouse
 *
 */
final class Warehouse
{
    private ?int $id;
    /**
     * @var string
     */
    private string $name;

    /**
     * @param $id
     * @param  string  $name
     * Warehouse constructor
     */
    public function __construct(?int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}