<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_trades', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->string('mobile');
            $table->string('nationalCode');
            $table->string('city_id');
            $table->string('province_id');
            $table->string('address')->nullable();
            $table->string('typeTrade');
            $table->string('category');
            $table->string('product');
            $table->string('model');
            $table->string('color');
            $table->string('serialDevice')->nullable();
            $table->string('description')->nullable();
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
