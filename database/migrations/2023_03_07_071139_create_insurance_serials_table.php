<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceSerialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_serials', function (Blueprint $table) {
            $table->id();
            $table->string('IMEI1');
            $table->string('IMEI2')->nullable();
            $table->string('Brand')->nullable();
            $table->string('Model')->nullable();
            $table->string('DeviceValue')->nullable();
            $table->string('InsuranceDate')->nullable();
            $table->bigInteger('Duration')->nullable();
            $table->string('TypeName')->nullable();
            $table->bigInteger('TypeCode')->nullable();
            $table->string('Insurer')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('insurance_serials');
    }
}
