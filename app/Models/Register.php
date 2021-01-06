<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'table_user';
    protected $fillable = ['first_name', 'last_name', 'phone', 'password'];

}
