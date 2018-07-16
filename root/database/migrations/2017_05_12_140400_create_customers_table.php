<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
			$table->string('cus_code',50);
			$table->string('cus_name',100);
			$table->string('address')->nullable();
			$table->string('phone')->nullable();
			$table->string('email')->nullable();
			$table->string('web')->nullable();
			$table->string('cont_name')->nullable();
			$table->string('cont_phone')->nullable();
			$table->string('cont_email')->nullable();
			$table->string('cus_cf1')->nullable();
			$table->string('cus_cf2')->nullable();
			$table->string('cus_cf3')->nullable();
			$table->string('cus_cf4')->nullable();
			$table->string('cus_cf5')->nullable();
			$table->string('status',1)->default('1');
			$table->string('tran_status',1)->default('N');
			$table->integer('user_create')->nullable();
			$table->integer('user_update')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
