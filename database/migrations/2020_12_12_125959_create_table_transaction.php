<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_transaction', function (Blueprint $table) {
            $table->bigIncrements('transaction_id');
            $table->integer('user_id');
            $table->integer('stand_id_active');
            $table->integer('product_id');
            $table->string('customer_name',50);
            $table->string('product_name');
            $table->smallinteger('table_number');
            $table->double('total_transaction');
            $table->double('discount');
            $table->string('order_notes');
            $table->datetime('order_time');
            $table->tinyinteger('payment_method');
            $table->tinyinteger('order_status');

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
        Schema::dropIfExists('table_transaction');
    }
}
