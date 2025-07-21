<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Класс app\CRM\Domain\Core\Entities\Order
 * namespace App\Models;
 *
 */
class Order extends Model
{
    /**
     * @var string
     */
    protected $table = 'orders';

    /**
     * @var string[]
     */
    protected $fillable = [
        'customer',
        'warehouse_id',
        'completed_at',
        'status'
    ];
}
