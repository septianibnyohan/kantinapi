<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWithdrawStand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_withdraw_stand', function (Blueprint $table) {
            $table->bigIncrements('withdrawal_id');
            $table->integer('stand_id_active');
            $table->integer('tenant_id');
            $table->double('money_stand');
            $table->string('account_number');
            $table->string('account_name');
            $table->double('nominal_withdrawal');
            $table->datetime('withdrawal_date');
            $table->smallinteger('withdrawal_status');
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
        Schema::dropIfExists('table_withdraw_stand');
    }
}
