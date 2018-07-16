<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePayArsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_pay_ars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pay_code')->nullable();
            $table->integer('client_id')->nullable();
            $table->string('ar_id')->nullable();
            $table->float('pay_amount',20,2)->nullable();
            $table->date('pay_date')->nullable();
            $table->integer('jn_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->smallInteger('status')->nullable();
            $table->smallInteger('trash')->nullable();
            $table->smallInteger('pay_action')->nullable();
            $table->string('referent')->nullable();
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
        Schema::dropIfExists('table_pay_ars');
    }
}
