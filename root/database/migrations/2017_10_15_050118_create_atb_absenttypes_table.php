<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtbAbsenttypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atb_absenttypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('att_title',250)->nullable();
            $table->string('attdetail',1000)->nullable();
            $table->string('attstatus',10)->nullable();
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
        Schema::dropIfExists('atb_absenttypes');
    }
}
