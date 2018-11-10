<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('Quantity');
            $table->unsignedDecimal('UnitPrice', 18, 2);
            $table->unsignedInteger('OrderID');
            $table->unsignedInteger('SouvenirID');
            $table->foreign('OrderID')->references('id')->on('orders')->onDelete('cascde');
            $table->foreign('SouvenirID')->references('id')->on('souvenirs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
