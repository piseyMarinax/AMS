<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmptrashToAtbStaffs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('atb_staffs', function (Blueprint $table) {
            $table->string('emptrash',10)->default('0')->after('sbrandid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('atb_staffs', function (Blueprint $table) {
            //
        });
    }
}
