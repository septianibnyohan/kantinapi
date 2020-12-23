<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Open extends Model
{
    protected $table = 'table_open_hours_stand';
    protected $fillable = ['stand_id_active', 'open_time', 'close_time','status_open'];
}
