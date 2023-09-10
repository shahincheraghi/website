<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('forms')) return;
        Schema::create('forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('name for forms');
            $table->text('description')->comment('description for forms')->nullable();
            $table->string('code')->unique()->comment('code unique for forms');
            $table->tinyInteger('status')->comment('status for forms');
            $table->longText('fields')->comment('fields into forms')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
