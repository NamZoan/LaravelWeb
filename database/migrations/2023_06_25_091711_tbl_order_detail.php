<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order_detail', function (Blueprint $table) {
            $table->increments("orderdetail_id");

            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('order_id')->on('tbl_order');

            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('tbl_product');

            $table->string('product_name');

            $table->float('product_price');

            $table->integer("product_quantity");
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
        Schema::dropIfExists('tbl_order_detail');
    }
}
