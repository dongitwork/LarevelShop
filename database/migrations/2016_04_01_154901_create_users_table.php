<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('UserId');
            $table->string('UserName',50);
            $table->string('Password',100);
            $table->string('Image');
            $table->tinyInteger('Status')->unsigned();
            $table->string('Email',100)->unique();
            $table->string('Address');
            $table->date('Birthday');
            $table->tinyInteger('Gender')->unsigned();
            $table->string('Phone',20);
            $table->rememberToken();
            $table->integer('RoleId')->unsigned()->nullable();
            $table->foreign('RoleId')->references('RoleId')->on('role')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
