<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_order_items', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('pre_order_id')->unsigned();
            $table->foreign('pre_order_id')->references('id')->on('pre_orders');


            $table->decimal('quantity', 10, 6);
            $table->decimal('unity_cost', 10,6);
            $table->double('net_weight', 15,8)->nullable();
            $table->double('gross_weight', 15,8)->nullable();


            $table->SoftDeletes();
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
        Schema::dropIfExists('pre_order_items');
    }
}
