<?php

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
        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments('OrderDetailId');
            $table->integer('OrderId')->unsigned();
            $table->foreign('OrderId')->references('OrderId')->on('order')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('ProductPublishId')->unsigned()->nullable();
            $table->foreign('ProductPublishId')->references('ProductPublishId')->on('product_publish')->onDelete('set null')->onUpdate('cascade');
            $table->integer('Quantity')->unsigned();
            $table->double('TotalPrice',10,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_detail');
    }
}
