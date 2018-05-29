<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_discount', function (Blueprint $table) {
            $table->integer('ProductPublishId')->primary()->unsigned();
            $table->integer('DiscountId')->unsigned();
            $table->date('StartDate');
            $table->date('EndDate');
            $table->foreign('ProductPublishId')->references('ProductPublishId')->on('product_publish')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('DiscountId')->references('DiscountId')->on('discount')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_discount');
    }
}
