<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_journals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jn_pid')->nullable();
            $table->string('jn_code')->nullable();
            $table->integer('jn_ac_type')->nullable();
            $table->string('jn_ac_code')->nullable();
            $table->date('jn_date_transaction')->nullable();
            $table->date('jn_date_pay')->nullable();
            $table->float('jn_drb',20,2)->nullable();
            $table->float('jn_crb',20,2)->nullable();
            $table->integer('jn_referent')->nullable();
            $table->integer('jn_class')->nullable();
            $table->string('jn_des')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('referent_tpye')->nullable();
            $table->smallInteger('jn_status')->nullable();
            $table->smallInteger('jn_trash')->nullable();
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
        Schema::dropIfExists('table_journals');
    }
}
