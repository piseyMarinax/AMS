<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAccountChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_account_charts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ac_code')->nullable();
            $table->string('ac_name')->nullable();
            $table->integer('ac_type')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('des')->nullable();
            $table->smallInteger('ordering')->nullable();
            $table->smallInteger('no_trash')->nullable();
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
        Schema::dropIfExists('table_account_charts');
    }
}
