<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSouvenirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souvenirs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('Name', 20);
            $table->string('Description', 50);
            $table->string('PhotoPath', 1000);
            $table->unsignedDecimal('Price', 18, 2);
            $table->unsignedInteger('CategoryID');
            $table->unsignedInteger('SupplierID');
            $table->foreign('CategoryID')->references('id')->on('categories');
            $table->foreign('SupplierID')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('souvenirs');
    }
}
