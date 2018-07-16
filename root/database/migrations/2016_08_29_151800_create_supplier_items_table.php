<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_items', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('sup_id');
			$table->integer('item_id');
			$table->string('unit_purch',50);
			$table->decimal('defult_cost',25,2);
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
        Schema::dropIfExists('supplier_items');
    }
}
