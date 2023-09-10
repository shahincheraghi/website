<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeContentInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_content_info', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('subTitle')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->nullable();
            $table->string('keyHomeContent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_content_info');
    }
}
