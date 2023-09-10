<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceOnlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('service_online', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->string('mobile');
            $table->string('nationalCode');
            $table->text('address')->nullable();
            $table->string('typeService');
            $table->string('typeDevice');
            $table->string('typeBrand');
            $table->string('modelDevice');
            $table->integer('city_id');
            $table->integer('state_id');
            $table->string('serialDevice')->nullable();
            $table->string('typeWarranty');
            $table->text('problemType');
            $table->text('descriptionProblem');
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
        Schema::dropIfExists('service_online');
    }
}
