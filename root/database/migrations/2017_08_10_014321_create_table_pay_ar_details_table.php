<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePayArDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_pay_ar_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->nullable();
            $table->integer('receiable_id')->nullable();
            $table->integer('payment_id')->nullable();
            $table->float('total_amount',20,2)->nullable();
            $table->date('date_connect')->nullable();
            $table->integer('jn_id')->nullable();
            $table->string('apply')->nullable();
            $table->float('apply_amount',20,2)->nullable();
            $table->integer('user_id')->nullable();
            $table->smallInteger('status')->nullable();
            $table->smallInteger('trash')->nullable();
            $table->smallInteger('action')->nullable();           
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
        Schema::dropIfExists('table_pay_ar_details');
    }
}
