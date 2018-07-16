<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbcustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbcustomers', function (Blueprint $table) {
            $table->increments('id');
			$table->Integer('cust_id')->nullable();
            $table->string('cust_name', 500)->nullable();
			$table->string('cust_phone', 100)->nullable();
			$table->string('cust_email', 100)->nullable();
			$table->string('cust_comname', 250)->nullable();
			$table->Integer('cust_tid')->nullable();
            $table->string('cust_status', 10)->nullable();
			$table->string('cust_trash', 10)->nullable();
            $table->string('cust_addr', 5000)->nullable();
			$table->string('cust_noted', 5000)->nullable();
			$table->date('cust_regdate')->nullable();
			$table->Integer('cust_regby')->nullable();
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
        Schema::dropIfExists('tbcustomers');
    }
}
