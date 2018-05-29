<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_status', function (Blueprint $table) {
            $table->increments('OrderStatusId');
            $table->integer('OrderId')->unsigned();
            $table->foreign('OrderId')->references('OrderId')->on('order')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('StatusId')->unsigned()->nullable();
            $table->foreign('StatusId')->references('StatusId')->on('status')->onDelete('set null')->onUpdate('cascade');
            $table->integer('UserId')->unsigned()->nullable();
            $table->foreign('UserId')->references('UserId')->on('user')->onDelete('set null')->onUpdate('cascade');
            $table->integer('ShipperId')->unsigned()->nullable();
            $table->foreign('ShipperId')->references('ShipperId')->on('shipper')->onDelete('set null')->onUpdate('cascade');
            $table->dateTime('DateModified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_status');
    }
}
