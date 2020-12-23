<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOpenHours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_open_hours_stand', function (Blueprint $table) {
            $table->bigIncrements('open_time_id');
            $table->integer('stand_id_active');
            $table->datetime('open_time');
            $table->datetime('close_time');
            $table->smallinteger('status_open');
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
        Schema::dropIfExists('table_open_hours_stand');
    }
}
