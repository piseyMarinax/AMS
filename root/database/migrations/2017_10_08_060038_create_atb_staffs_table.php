<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtbStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atb_staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullnameen', 100)->nullable();
            $table->string('fullnamekh',100)->nullable();
            $table->date('dob')->nullable();
            $table->string('gender',50)->nullable();
            $table->string('phone',100)->nullable();
            $table->date('sdateregister')->nullable();
            $table->date('sdateleave')->nullable();
            $table->string('saddress',1000)->nullable();
            $table->Integer('stafftypeid')->nullable();
            $table->Integer('sbrandid')->nullable();
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
        Schema::dropIfExists('atb_staffs');
    }
}
