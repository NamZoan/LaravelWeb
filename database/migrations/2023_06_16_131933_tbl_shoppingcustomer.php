<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblShoppingcustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tlb_shoppingcustomer', function (Blueprint $table) {
            $table->increments('shoppingcustomer_id');
            $table->int('customer_id');
            $table->string('shoppingcustomer_name');
            $table->string('shoppingcustomer_phone');
            $table->text('shoppingcustomer_address');
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
        Schema::dropIfExists('tlb_shoppingcustomer');
    }
}
