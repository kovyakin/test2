<?php

namespace App\CRM\Application\Exceptions;

use Exception;

class OrderItemException extends Exception
{
    public static function errorAdd(): static
    {
        return new static('Error add product to order') ;
    }
}
