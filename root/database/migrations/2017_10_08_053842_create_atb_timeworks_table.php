<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtbTimeworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atb_timeworks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titleshift',100)->nullable();
            $table->string('timeofshift',50)->nullable();
            $table->string('tdetail',1000)->nullable();
            $table->string('tstatus',50)->nullable();
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
        Schema::dropIfExists('atb_timeworks');
    }
}
