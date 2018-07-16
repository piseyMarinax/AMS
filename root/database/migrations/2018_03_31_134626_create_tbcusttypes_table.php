<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbcusttypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbcusttypes', function (Blueprint $table) {
            $table->increments('id');
			$table->Integer('ct_id')->nullable();
			$table->string('ct_title', 100)->nullable();
			$table->string('ct_des', 1000)->nullable();
            $table->string('ct_status', 10)->nullable();
            $table->string('ct_trash', 10)->nullable();
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
        Schema::dropIfExists('tbcusttypes');
    }
}
