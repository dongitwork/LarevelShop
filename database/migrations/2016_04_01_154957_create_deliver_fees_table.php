<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliverFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliver_fee', function (Blueprint $table) {
            $table->increments('DeliverFeeId');
            $table->tinyInteger('Status')->unsigned();
            $table->double('Distance',10,2);
            $table->double('Price',10,2);
            $table->text('Description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('deliver_fee');
    }
}
