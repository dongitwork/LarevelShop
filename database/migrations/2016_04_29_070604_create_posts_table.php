<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('PostId');
            $table->string('Title');
            $table->text('Body');
            $table->tinyInteger('Active')->unsigned();
            $table->dateTime('CreatedAt');
            $table->dateTime('UpdatedAt');
            $table->integer('UserId')->unsigned()->nullable();
            $table->foreign('UserId')->references('UserId')->on('user')->onDelete('set null')->onUpdate('cascade');
            $table->integer('PostCategoryId')->unsigned()->nullable();
            $table->foreign('PostCategoryId')->references('PostCategoryId')->on('post_category')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post');
    }
}
