<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarrantyExtensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranty_extensions', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->string('mobile');
            $table->string('nationalCode');
            $table->string('city_id');
            $table->string('province_id');
            $table->string('address')->nullable();
            $table->string('serialDevice');
            $table->string('category');
            $table->string('product');
            $table->string('model');
            $table->string('color');
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('warranty_extensions');
    }
}
