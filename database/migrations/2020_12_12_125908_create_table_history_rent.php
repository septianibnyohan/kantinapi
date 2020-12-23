<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHistoryRent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_history_rent', function (Blueprint $table) {
            $table->bigIncrements('history_id');
            $table->integer('tenant_id');
            $table->integer('stand_id_active');
            $table->string('phone',15);
            $table->smallinteger('number_stand');
            $table->integer('rent_id');
            $table->string('photo_stand');
            $table->string('stand_category',15);
            $table->string('email',50);
            $table->string('name_profile',50);
            $table->datetime('tenant_date');
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
        Schema::dropIfExists('table_history_rent');
    }
}
