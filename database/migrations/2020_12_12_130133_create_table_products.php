<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->integer('stand_id_active');
            $table->string('stand_category',15);
            $table->string('product_name');
            $table->double('product_price');
            $table->double('product_discount');
            $table->string('product_image');
            $table->string('product_description');
            $table->tinyinteger('product_status');
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
        Schema::dropIfExists('table_products');
    }
}
