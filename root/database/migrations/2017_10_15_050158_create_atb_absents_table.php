<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtbAbsentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atb_absents', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('staffid')->nullable();
            $table->Integer('att_typeid')->nullable();
            $table->Integer('addORrequest_by')->nullable();
            $table->Integer('approvedby')->nullable();
            $table->date('attdate')->nullable();
            $table->string('attdetail',1000)->nullable();
            $table->string('attstatus',50)->nullable();
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
        Schema::dropIfExists('atb_absents');
    }
}
