<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('CustomerId');
            $table->string('CustomerFullName',50);
            $table->string('Password',100);
            $table->string('Image')->default('/img/customer/Majin_buu.jpg');
            $table->tinyInteger('Status')->unsigned();
            $table->string('Address')->nullable();
            $table->string('Email',100)->unique();
            $table->date('Birthday')->nullable();
            $table->tinyInteger('Gender')->unsigned();
            $table->string('Phone',20)->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer');
    }
}
