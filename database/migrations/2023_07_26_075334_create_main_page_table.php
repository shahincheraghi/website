<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_page', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('topTitle')->nullable();
            $table->text('description')->nullable();
            $table->integer('type');
            $table->integer('sort');
            $table->integer('status');
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
        Schema::dropIfExists('main_page');
    }
}
