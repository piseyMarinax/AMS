<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbpricesetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbpricesets', function (Blueprint $table) {
            $table->increments('id');
			$table->Integer('p_id')->nullable();
			$table->float('p_price', 100)->nullable();
			$table->string('p_des', 1000)->nullable();
            $table->string('p_status', 10)->nullable();
            $table->string('p_trash', 10)->nullable();
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
        Schema::dropIfExists('tbpricesets');
    }
}
