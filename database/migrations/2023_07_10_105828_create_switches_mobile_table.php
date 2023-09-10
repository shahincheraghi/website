<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwitchesMobileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('switches_mobile', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->string('mobile');
            $table->string('nationalCode');
            $table->string('city_id');
            $table->string('province_id');
            $table->string('address')->nullable();
            $table->string('categorySellSwitchMobile');
            $table->string('productSellSwitchMobile');
            $table->string('modelSellSwitchMobile');
            $table->string('ColorSellSwitchMobile');
            $table->string('serialSellSwitchMobile');
            $table->string('descriptionSellSwitchMobile')->nullable();
            $table->string('imgSellSwitchMobile')->nullable();
            $table->string('categoryBuySwitchMobile');
            $table->string('productBuySwitchMobile');
            $table->string('modelBuySwitchMobile');
            $table->string('ColorBuySwitchMobile');
            $table->string('imgBuySwitchMobile')->nullable();
            $table->string('descriptionBuySwitchMobile')->nullable();
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
        Schema::dropIfExists('form_trades');
    }
}
