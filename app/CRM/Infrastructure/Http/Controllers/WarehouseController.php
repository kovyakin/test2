<?php

namespace App\CRM\Infrastructure\Http\Controllers;

use App\CRM\Domain\Core\Contracts\WarehouseGetAllContract;
use App\Http\Controllers\Controller;

class WarehouseController extends Controller
{

    public function __construct(
        private readonly WarehouseGetAllContract $warehouseGetAll
    ) {
    }

    public function index()
    {
        return $this->warehouseGetAll->execute();
    }
}
