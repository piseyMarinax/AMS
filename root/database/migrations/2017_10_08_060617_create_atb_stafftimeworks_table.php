<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtbStafftimeworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atb_stafftimeworks', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('ststaffid')->nullable();
            $table->Integer('sttimeid')->nullable();
            $table->date('ststartdate')->nullable();
            $table->date('stexpiredate')->nullable();
            $table->string('ststatus',50)->nullable();
            $table->string('stdetail',1000)->nullable();
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
        Schema::dropIfExists('atb_stafftimeworks');
    }
}
