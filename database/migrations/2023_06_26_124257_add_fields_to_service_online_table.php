<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToServiceOnlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_online', function (Blueprint $table) {
            $table->string('category')->after('address');
            $table->string('model')->after('category');
            $table->string('color')->after('model');
            $table->string('problemEvent')->after('color');
            $table->string('descriptionProblemEvent')->after('serialDevice')->nullable();

            $table->dropColumn('typeService');
            $table->dropColumn('typeDevice');
            $table->dropColumn('typeBrand');
            $table->dropColumn('modelDevice');
            $table->dropColumn('problemType');
            $table->dropColumn('typeWarranty');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_online', function (Blueprint $table) {

        });
    }
}
