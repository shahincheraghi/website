<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormBuildersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('forms')) return;
        Schema::create('form_builders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('form_id')->index();
            $table->foreign('form_id')->references('id')->on('forms') ->onDelete('cascade')->onUpdate('cascade');
            $table->json('data');
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
        Schema::dropIfExists('form_builders');
    }
}
