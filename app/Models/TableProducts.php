<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableProducts extends Model
{
    protected $table = 'table_products';

    protected $fillable = [
        'stand_id_active', 'stand_category', 'product_name', 'product_price', 'product_discount', 'product_image', 'product_description', 'product_status'
    ];

}
