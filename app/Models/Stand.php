<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    protected $table = 'table_stand';
    protected $fillable = ['number_stand', 'category', 'status_stand_avail'];
}
