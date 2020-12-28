<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'table_transaction';
    protected $fillable = ['user_id', 'stand_id_active', 'product_id','customer_name','table_number','total_transaction','discount','order_notes',
        'payment_method','order_status'];
}
