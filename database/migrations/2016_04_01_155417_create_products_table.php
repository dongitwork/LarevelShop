<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('ProductId');
            $table->string('ProductName',100);
            $table->dateTime('CreatedAt');
            $table->dateTime('UpdatedAt');
            $table->double('Price',10,2);
            $table->integer('Quantity')->unsigned();
            $table->integer('QuantityBackUp')->unsigned();
            $table->string('Image');
            $table->text('Description')->nullable();
            $table->text('ShortDescription')->nullable();
            $table->string('DeviceAttached')->nullable();
            $table->integer('TaxId')->unsigned()->nullable();
            $table->foreign('TaxId')->references('TaxId')->on('tax')->onDelete('set null')->onUpdate('cascade');
            $table->integer('CategoryId')->unsigned()->nullable();
            $table->foreign('CategoryId')->references('CategoryId')->on('category')->onDelete('set null')->onUpdate('cascade');
            $table->integer('ManufacturerId')->unsigned()->nullable();
            $table->foreign('ManufacturerId')->references('ManufacturerId')->on('manufacturer')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product');
    }
}
