<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ward', function (Blueprint $table) {
            $table->integer('WardId')->unsigned()->primary();
            $table->string('WardName',50);
            $table->string('Type',30);
            $table->string('Location',30);
            $table->integer('DistrictId')->unsigned();
            $table->foreign('DistrictId')->references('DistrictId')->on('district');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ward');
    }
}
