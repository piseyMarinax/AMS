<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtbStaffstatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atb_staffstatuses', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('statid')->nullable();
            $table->Integer('staffid')->nullable();
            $table->date('sta_issuedate')->nullable();
            $table->date('sta_expiredate')->nullable();
            $table->string('sta_status', 10)->nullable();
            $table->string('sta_files', 250)->nullable();
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
        Schema::dropIfExists('atb_staffstatuses');
    }
}
