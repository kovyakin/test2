<?php

namespace App\CRM\Infrastructure\Http\Controllers;

use App\CRM\Domain\Core\Contracts\WarehouseGetAllContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WarehouseController extends Controller
{

    public function __construct(
        private readonly WarehouseGetAllContract $warehouseGetAll
    ) {
    }

    public function __invoke(): AnonymousResourceCollection
    {
        return $this->warehouseGetAll->execute();
    }


}
