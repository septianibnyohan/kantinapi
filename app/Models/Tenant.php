<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $table = 'table_tenant';
    protected $fillable = ['phone', 'email', 'name_profile'];
}
