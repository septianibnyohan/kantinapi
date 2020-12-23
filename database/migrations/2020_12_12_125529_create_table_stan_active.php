<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStanActive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_stand_active', function (Blueprint $table) {
        
            $table->bigIncrements('stan_id_active');
            $table->integer('tenant_id');
            $table->integer('stan_id');
            $table->integer('number_stan');
            $table->string('name_profile',50);
            $table->double('money_stan');
            $table->string('stan_category',50);
            $table->integer('status_open');
            $table->integer('status_active');
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
        Schema::dropIfExists('table_stand_active');
    }
}
