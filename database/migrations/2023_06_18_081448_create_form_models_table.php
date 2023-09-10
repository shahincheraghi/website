<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_models', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('name for categories table');

            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('id')->on('form_products')->onDelete('cascade')->onUpdate('cascade');


            $table->integer('sort')->comment('sort for categories table');
            $table->text('img')->comment('img for categories table')->nullable();
            $table->integer('status')->comment('status for categories table');
            $table->softDeletes();
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
        Schema::dropIfExists('form_models');
    }
}
