<?php

declare(strict_types=1);

namespace App\CRM\Domain\Core\Contracts;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface WarehouseGetAllContract
{
    public function execute(): AnonymousResourceCollection;
}