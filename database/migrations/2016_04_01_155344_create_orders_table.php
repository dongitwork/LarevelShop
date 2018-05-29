<?php

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
        Schema::create('order', function (Blueprint $table) {
            $table->increments('OrderId');
            $table->dateTime('CreatedAt');
            $table->date('DeliverDate');
            $table->string('FullName',50);
            $table->string('Address');
            $table->string('Phone',20);
            $table->double('TotalPrice',10,2);
            $table->double('PriceDeliver',10,2);
            $table->integer('CustomerId')->unsigned()->nullable();
            $table->foreign('CustomerId')->references('CustomerId')->on('customer')->onDelete('set null')->onUpdate('cascade');
            $table->integer('PaymentMethodId')->unsigned()->nullable();
            $table->foreign('PaymentMethodId')->references('PaymentMethodId')->on('payment_method')->onDelete('set null')->onUpdate('cascade');
            $table->integer('WardId')->unsigned();
            $table->foreign('WardId')->references('WardId')->on('ward');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order');
    }
}
