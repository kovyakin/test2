<?php

namespace App\CRM\Infrastructure\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderFilteredResource extends JsonResource
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
            'completed_at' => $this['completed_at'],
            'customer' => $this['customer'],
            'status' => $this['status'],
            'warehouse_id' => $this['warehouse_id'],
            'created_at' => $this['created_at'],
        ];
    }
}
