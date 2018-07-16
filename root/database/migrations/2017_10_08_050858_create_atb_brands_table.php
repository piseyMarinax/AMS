<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtbBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atb_brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand',250)->nullable();
            $table->string('location',1000)->nullable();
            $table->string('bstatus',50)->nullable();
            $table->string('bdetail',1000)->nullable();
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
        Schema::dropIfExists('atb_brands');
    }
}
