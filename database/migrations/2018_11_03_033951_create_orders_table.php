<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('City', 20);
            $table->string('Country', 20);
            $table->string('FirstName', 50);
            $table->string('LastName', 50);
            $table->dateTime('OrderDate');
            $table->string('PhoneNumber', 30);
            $table->string('State', 20);
            $table->string('Address', 100);
            $table->string('PostalCode', 10);
            $table->integer('Status');
            $table->unsignedDecimal('TotalCost', 18, 2);
            $table->unsignedInteger('UserID');
            $table->foreign('UserID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
