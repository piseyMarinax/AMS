<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtbStafffunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atb_stafffunctions', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('sfstaffid')->nullable();
            $table->Integer('sfdeptid')->nullable();
            $table->Integer('sffuncid')->nullable();
            $table->date('sfstartdate')->nullable();
            $table->date('sfenddate')->nullable();
            $table->string('sfstatus',50)->nullable();
            $table->string('sfdetail',1000)->nullable();
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
        Schema::dropIfExists('atb_stafffunctions');
    }
}
