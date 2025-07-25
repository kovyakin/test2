<?php

namespace App\CRM\Infrastructure\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WarehouseProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {

        return [
            'id' => $this['id'],
            'name' => $this['name'],
            'stocks' => $this['stocks'],

        ];
    }
}
