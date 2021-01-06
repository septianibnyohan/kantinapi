<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableTopupRequest extends Model
{
    protected $table = 'table_topup_request';

    protected $fillable = [
        'user_id', 'total_amount', 'status_topup'
    ];

}
