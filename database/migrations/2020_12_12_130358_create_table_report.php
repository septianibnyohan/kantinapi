<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_report', function (Blueprint $table) {
            $table->bigIncrements('report_id');
            $table->integer('product_id');
            $table->integer('stand_id_active');
            $table->integer('transaction_id');
            $table->double('total_transaction');
            $table->string('product_name');
            $table->datetime('order_time');
            $table->smallinteger('number_stand');
            $table->integer('total_sales');
            $table->datetime('report_start_date');
            $table->datetime('report_end_date');
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
        Schema::dropIfExists('table_report');
    }
}
