<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPublishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_publish', function (Blueprint $table) {
            $table->increments('ProductPublishId');
            $table->tinyInteger('Status')->unsigned();
            $table->string('AdsImage');
            $table->tinyInteger('ProfitPercent')->unsigned();
            $table->dateTime('PublishedAt');
            $table->tinyInteger('Sticky')->nullable();
            $table->integer('ProductId')->unsigned();
            $table->foreign('ProductId')->references('ProductId')->on('product')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_publish');
    }
}
