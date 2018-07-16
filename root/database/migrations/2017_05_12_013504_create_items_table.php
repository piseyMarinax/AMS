<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
			$table->string('item_code',50);
			$table->string('item_barcode',50)->nullable();
			$table->string('item_name');
			$table->string('item_desc')->nullable();;
			$table->integer('category_id');
			$table->decimal('default_cost', 25, 2)->default(0);
			$table->decimal('default_price', 25, 2)->default(0);
			$table->decimal('item_price1', 25, 2)->default(0);
			$table->decimal('item_price2', 25, 2)->default(0);
			$table->decimal('item_price3', 25, 2)->default(0);
			$table->decimal('item_price4', 25, 2)->default(0);
			$table->decimal('item_price5', 25, 2)->default(0);
            $table->string('unit_stock',10);
			$table->string('unit_purch',10);
			$table->string('item_cf1')->nullable();
			$table->string('item_cf2')->nullable();
			$table->string('item_cf3')->nullable();
			$table->string('item_cf4')->nullable();
			$table->string('item_cf5')->nullable();
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
        Schema::dropIfExists('items');
    }
}
