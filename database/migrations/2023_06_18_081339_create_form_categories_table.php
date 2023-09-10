<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('name for categories table');
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
        Schema::dropIfExists('form_categories');
    }
}
