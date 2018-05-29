<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('CommentId');
            $table->text('Content');
            $table->dateTime('CreatedAt');
            $table->dateTime('UpdatedAt')->nullable();
            $table->tinyInteger('Status')->unsigned();
            $table->integer('ProductPublishId')->unsigned();
            $table->foreign('ProductPublishId')->references('ProductPublishId')->on('product_publish')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('CustomerId')->unsigned()->nullable();
            $table->foreign('CustomerId')->references('CustomerId')->on('customer')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comment');
    }
}
