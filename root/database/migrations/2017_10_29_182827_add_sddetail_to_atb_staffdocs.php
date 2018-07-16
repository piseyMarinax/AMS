<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSddetailToAtbStaffdocs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('atb_staffdocs', function (Blueprint $table) {
            $table->string('sddetail',5000)->nullable()->after('sdstatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('atb_staffdocs', function (Blueprint $table) {
            //
        });
    }
}
