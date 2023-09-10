<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterCodesUssdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::create('register_codes_ussd', function (Blueprint $table) {
            $table->id();
            $table->string('fullName')->nullable();
            $table->string('Mobile');
            $table->string('NationalCode')->nullable();
            $table->bigInteger('Imei')->nullable();
            $table->bigInteger('Status');
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
        Schema::dropIfExists('register_codes_ussd');
    }
}
