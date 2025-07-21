<?php

namespace App\CRM\Infrastructure\Http\Enums;

enum OrderStatus: string
{
    case ACTIVE = 'active';
    case COMPLETED = 'completed';
    case CANCELED = 'canceled';
}
