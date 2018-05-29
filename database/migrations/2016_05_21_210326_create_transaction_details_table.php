<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_detail', function (Blueprint $table) {
            $table->increments('TransactionDetailId');
            $table->string('ErrorCode')->nullable();
            $table->string('Token')->nullable();
            $table->string('Description')->nullable();
            $table->string('TransactionStatus')->nullable();
            $table->string('ReceiverEmail')->nullable();
            $table->string('OrderCode')->nullable();
            $table->float('TotalAmount')->nullable();
            $table->string('PaymentMethod')->nullable();
            $table->string('BankCode')->nullable();
            $table->string('PaymentType')->nullable();
            $table->string('OrderDescription')->nullable();
            $table->float('TaxAmount')->nullable();
            $table->float('DiscountAmount')->nullable();
            $table->float('FeeShipping')->nullable();
            $table->string('ReturnUrl')->nullable();
            $table->string('CancelUrl')->nullable();
            $table->string('BuyerFullname')->nullable();
            $table->string('BuyerEmail')->nullable();
            $table->string('BuyerMobile')->nullable();
            $table->string('BuyerAddress')->nullable();
            $table->string('AffiliateCode')->nullable();
            $table->string('TransactionId')->nullable();
            $table->integer('OrderId')->unsigned();
            $table->foreign('OrderId')->references('OrderId')->on('order')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaction_detail');
    }
}
