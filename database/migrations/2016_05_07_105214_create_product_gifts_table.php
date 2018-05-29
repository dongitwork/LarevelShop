<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_gift', function (Blueprint $table) {
            $table->integer('ProductPublishId')->unsigned();
            $table->integer('GiftId')->unsigned();
            $table->date('StartDate');
            $table->date('EndDate');
            $table->foreign('ProductPublishId')->references('ProductPublishId')->on('product_publish')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('GiftId')->references('GiftId')->on('gift')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['ProductPublishId','GiftId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_gift');
    }
}
