<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StandActive extends Model
{
    protected $table = 'table_stand_active';
    protected $fillable = ['tenant_id', 'stand_id','number_stan','name_profile','money_stan','stan_category','status_open','status_active','tenant_date'];
}
