<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->string('imei')->comment('serial Code Mobile');
            $table->string('fullName')->comment('name and family user');
            $table->string('mobile')->comment('phone number user');
            $table->string('nationalCode')->comment('national code user');
            $table->string('city')->comment('city user');
            $table->string('province')->comment('state user');
            $table->string('address')->comment('address user ');
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
        Schema::dropIfExists('insurances');
    }
}
