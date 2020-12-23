<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_rating', function (Blueprint $table) {
            $table->bigIncrements('raing_id');
            $table->integer('user_id');
            $table->integer('transaction_id');
            $table->integer('product_id');
            $table->integer('stand_id_active');
            $table->integer('rating_stars_product');
            $table->integer('rating_stars_stand');
            $table->string('comment_for_rating');
            
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
        Schema::dropIfExists('table_rating');
    }
}
