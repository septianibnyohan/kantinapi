<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTenant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_tenant', function (Blueprint $table) {
            $table->bigIncrements('tenant_id');
            $table->string('password',25);
            $table->string('phone',15);
            $table->string('avatar_tenant');
            $table->integer('rent_id');
            $table->string('email',50);
            $table->string('name_profile',50);
            $table->string('photo_ktp');
            $table->string('photo_npwp');
            $table->string('photo_payment_confirm');
            $table->string('stan_category',15);
            $table->integer('rent_status');
            $table->datetime('rental_date_start');
            $table->datetime('rental_date_end');
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
        Schema::dropIfExists('table_tenant');
    }
}
