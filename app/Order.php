<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'table_order_detail';
    protected $fillable = ['transaction_id', 'product_ids', 'product_name','qty','harga','discount','total'];

    public function setUpdatedAt($value)
    {
      return NULL;
    }
}
