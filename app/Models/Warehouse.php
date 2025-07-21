<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Класс app\CRM\Domain\Core\Entities\Warehouse
 * namespace App\Models;
 *
 */
class Warehouse extends Model
{
    /**
     * @var string
     */
    protected $table = 'warehouses';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name'
    ];
}
