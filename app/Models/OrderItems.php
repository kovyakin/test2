<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    /**
     * @var string
     */
    protected $table = 'order_items';

    /**
     * @var string[]
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'count',
    ];
}
