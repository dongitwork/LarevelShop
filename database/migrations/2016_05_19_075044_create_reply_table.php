<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply', function (Blueprint $table) {
            $table->increments('ReplyId');
            $table->text('Content');
            $table->dateTime('CreatedAt');
            $table->dateTime('UpdatedAt');
            $table->integer('CommentId')->unsigned();
            $table->foreign('CommentId')->references('CommentId')->on('comment')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('UserId')->unsigned()->nullable();
            $table->foreign('UserId')->references('UserId')->on('user')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reply');
    }
}
