<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_option', function (Blueprint $table) {
            $table->increments('ProductOptionId');
            $table->string('Field');
            $table->string('Label');
            $table->string('Type');
            $table->text('Description')->nullable();
            $table->integer('CategoryId')->unsigned();
            $table->foreign('CategoryId')->references('CategoryId')->on('category')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_option');
    }
}
