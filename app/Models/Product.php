<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Класс Product
 * namespace App\Models;
 *
 */
class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'price'
    ];
}
