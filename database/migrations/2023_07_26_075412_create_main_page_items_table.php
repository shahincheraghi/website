<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainPageItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_page_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mainPageId')->nullable();
            $table->foreign('mainPageId')->references('id')->on('main_page')->onDelete('cascade');
            $table->integer('sort');
            $table->unsignedBigInteger('homeContentId')->nullable();
            $table->foreign('homeContentId')->references('id')->on('home_contents')->onDelete('cascade');
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
        Schema::dropIfExists('main_page_items');
    }
}
