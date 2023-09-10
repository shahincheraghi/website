<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToFooterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('footer', function (Blueprint $table) {

            $table->string('statusTopFooter')->nullable()->after('titleSubscribe');
            $table->string('topFooterTitle')->nullable()->after('status');
            $table->string('topFooterDescription')->nullable()->after('topFooterTitle');
            $table->string('topFooterIcon')->nullable()->after('topFooterDescription');
            $table->string('topFooterTitleBtnOne')->nullable()->after('topFooterIcon');
            $table->string('topFooterLinkBtnOne')->nullable()->after('topFooterTitleBtnOne');
            $table->string('topFooterTitleBtnTow')->nullable()->after('topFooterLinkBtnOne');
            $table->string('topFooterLinkBtnTow')->nullable()->after('topFooterTitleBtnTow');
            $table->string('titleCopyRightBottomFooter')->nullable()->after('topFooterLinkBtnTow');
            $table->string('titleDevelopBottomFooter')->nullable()->after('titleCopyRightBottomFooter');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('footer', function (Blueprint $table) {
            //
        });
    }
}
