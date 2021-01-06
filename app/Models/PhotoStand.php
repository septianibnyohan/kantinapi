<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoStand extends Model
{
    protected $table = 'table_photo_stand';
    protected $fillable = ['stand_id_active', 'photo_stand'];
}
