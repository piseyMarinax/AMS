<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('acc_code')->nullable();
            $table->float('amount',20,2)->nullable();
            $table->date('expense_date')->nullable();
            $table->integer('class')->nullable();
            $table->integer('jn_id')->nullable();
            $table->integer('image')->nullable();
            $table->integer('user_id')->nullable();
            $table->smallInteger('status')->nullable();
            $table->smallInteger('trash')->nullable();
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
        Schema::dropIfExists('table_expenses');
    }
}
