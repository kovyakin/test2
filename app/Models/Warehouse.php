<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Класс Warehouse
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
