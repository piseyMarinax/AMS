<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtbStaffattendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atb_staffattendances', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('staffid')->nullable();
            $table->date('att_date')->nullable();
            $table->string('late_in', 50)->nullable();
            $table->string('s_out',50)->nullable();
            $table->Integer('attaddedby')->nullable();
            $table->string('att_detail',1000)->nullable();
            $table->string('att_status',50)->nullable();
            $table->string('att_empty',50)->nullable();
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
        Schema::dropIfExists('atb_staffattendances');
    }
}
