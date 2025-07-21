<?php

namespace app\CRM\Application\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WarehouseException extends Exception
{
    public static function errorWarehouse(): static
    {
        return new static('Error Warehouse') ;
    }
}
