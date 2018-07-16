<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtbSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atb_salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('staffid',100)->nullable();
            $table->float('salary', 20,2)->nullable();
            $table->date('startdate')->nullable();
            $table->date('expiredate')->nullable();
            $table->string('dstatus',50)->nullable();
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
        Schema::dropIfExists('atb_salaries');
    }
}
