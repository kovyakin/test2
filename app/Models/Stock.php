<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Класс app\CRM\Domain\Core\Entities\Stock
 * namespace App\Models;
 *
 */
class Stock extends Model
{
    /**
     * @var string
     */
    protected $table = 'stocks';
    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'warehouse_id',
        'stock'
    ];
}
