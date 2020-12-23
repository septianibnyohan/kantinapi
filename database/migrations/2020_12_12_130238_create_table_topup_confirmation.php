<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTopupConfirmation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_topup_confirmation', function (Blueprint $table) {
            $table->bigIncrements('topup_id');
            $table->datetime('submit_date');
            $table->string('bank_name');
            $table->string('account_name');
            $table->string('account_number');
            $table->string('confirmation_topup_photo');
            $table->tinyinteger('status');
            $table->string('update_note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_topup_confirmation');
    }
}
