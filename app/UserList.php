<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    protected $table = 'table_user';
    protected $fillable = ['name', 'email', 'password','phone','avatar_user','emoney','status'];
    
}
