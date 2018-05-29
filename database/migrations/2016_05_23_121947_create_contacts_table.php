<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->increments('ContactId');
            $table->string('ContactName',50);
            $table->string('Email',100);
            $table->string('Title',100)->nullable();
            $table->tinyInteger('Status')->unsigned();
            $table->dateTime('CreatedAt');
            $table->text('Content');
            $table->text('ReplyContent');
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
        Schema::drop('contact');
    }
}
