<?php

namespace App\CRM\Application\Exceptions;

use Exception;

class OrderException extends Exception
{
    public static function errorCreate(): static
    {
        return new static('Error create order') ;
    }
}
