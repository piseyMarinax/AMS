<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTypeOfPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_type_of_pays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('acc_id')->nullable()->default(0);
            $table->string('referent_no')->nullable()->default(0);
            $table->float('amount',20,2)->nullable()->default(0);
            $table->string('number')->nullable();
            $table->string('des')->nullable();
            $table->smallInteger('status')->nullable();
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
        Schema::dropIfExists('table_type_of_pays');
    }
}
