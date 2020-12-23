<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBroadcast extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_broadcast', function (Blueprint $table) {
            $table->bigIncrements('broadcast_id');
            $table->integer('product_id');
            $table->integer('stand_id_active');
            $table->string('broadcast_title');
            $table->string('broadcast_description');
            $table->string('broadcast_deeplink');
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
        Schema::dropIfExists('table_broadcast');
    }
}
