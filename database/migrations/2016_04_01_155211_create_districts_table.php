<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district', function (Blueprint $table) {
            $table->integer('DistrictId')->unsigned()->primary();
            $table->string('DistrictName',50);
            $table->string('Type',30);
            $table->string('Location',30);
            $table->integer('ProvinceId')->unsigned();
            $table->foreign('ProvinceId')->references('ProvinceId')->on('province');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('district');
    }
}
