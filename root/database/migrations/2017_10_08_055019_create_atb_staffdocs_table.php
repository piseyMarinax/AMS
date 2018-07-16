<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtbStaffdocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atb_staffdocs', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('sdstaffid')->nullable();
            $table->Integer('sddocid')->nullable();
            $table->string('sdtitlenumber',100)->nullable();
            $table->date('sdissuedate')->nullable();
            $table->date('sdexpiredate')->nullable();
            $table->string('sdstatus',50)->nullable();
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
        Schema::dropIfExists('atb_staffdocs');
    }
}
