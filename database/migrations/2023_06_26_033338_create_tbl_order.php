<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order', function (Blueprint $table) {
            $table->increments("order_id");

            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('tbl_customer');

            $table->unsignedInteger('shoppingcustomer_id');
            $table->foreign('shoppingcustomer_id')->references('shoppingcustomer_id')->on('tbl_shoppingcustomer');

            $table->unsignedInteger('payment_id');
            $table->foreign('payment_id')->references('payment_id')->on('tbl_payment');

            $table->float('order_total');
            $table->integer('order_status');

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
        Schema::dropIfExists('tbl_order');
    }
}
