<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableTopupConfirmation extends Model
{
    protected $table = 'table_topup_confirmation';

    protected $fillable = [
        'submit_date', 'bank_name', 'account_name', 'account_number', 'confirmation_topup_photo', 'status', 'update_note'
    ];

}
