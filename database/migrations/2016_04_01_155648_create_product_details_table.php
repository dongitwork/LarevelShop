<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_detail', function (Blueprint $table) {
            $table->increments('ProductDetailId');
            $table->integer('ProductId')->unsigned();
            $table->foreign('ProductId')->references('ProductId')->on('product')->onDelete('cascade')->onUpdate('cascade');
            $table->string('DisplayTech')->nullable();
            $table->string('Resolution')->nullable();
            $table->string('DisplaySize')->nullable();
            $table->string('Touchscreen')->nullable();
            $table->string('CoverGlass')->nullable();
            $table->string('RearCameraRes')->nullable();
            $table->string('Film')->nullable();
            $table->string('Flash')->nullable();
            $table->string('AdvancedImageCapture')->nullable();
            $table->string('FrontCameraRes')->nullable();
            $table->string('OS')->nullable();
            $table->string('Chipset')->nullable();
            $table->string('CPUSpeed')->nullable();
            $table->string('GPU')->nullable();
            $table->string('RAM')->nullable();
            $table->string('ROM')->nullable();
            $table->string('MemCard')->nullable();
            $table->string('MemCardMax')->nullable();
            $table->string('2G')->nullable();
            $table->string('3G')->nullable();
            $table->string('4G')->nullable();
            $table->string('SIM')->nullable();
            $table->string('SIMType')->nullable();
            $table->string('Wifi')->nullable();
            $table->string('GPS')->nullable();
            $table->string('Bluetooth')->nullable();
            $table->string('NFC')->nullable();
            $table->string('Interface')->nullable();
            $table->string('Jack')->nullable();
            $table->string('Design')->nullable();
            $table->string('Material')->nullable();
            $table->string('Dimension')->nullable();
            $table->string('Weight')->nullable();
            $table->string('BatteryCapacity')->nullable();
            $table->string('BatteryType')->nullable();
            $table->string('VideoFileType')->nullable();
            $table->string('MusicFileType')->nullable();
            $table->string('AudioRecoder')->nullable();
            $table->string('Radio')->nullable();
            $table->string('Warranty')->nullable();
            $table->string('Other')->nullable();
            $table->string('Call')->nullable();
            $table->string('CPUManufacturer')->nullable();
            $table->string('CPUTech')->nullable();
            $table->string('CPUType')->nullable();
            $table->string('Cache')->nullable();
            $table->string('CPUMaxSpeed')->nullable();
            $table->string('BusSpeed')->nullable();
            $table->string('RAMMaxSupport')->nullable();
            $table->string('RAMType')->nullable();
            $table->string('RAMBus')->nullable();
            $table->string('StorageType')->nullable();
            $table->string('Storage')->nullable();
            $table->string('GPUMem')->nullable();
            $table->string('GPUDesign')->nullable();
            $table->string('AudioChannel')->nullable();
            $table->string('AddInfo')->nullable();
            $table->string('OpticalDisk')->nullable();
            $table->string('OpticalDiskType')->nullable();
            $table->string('ExtFeature')->nullable();
            $table->string('LAN')->nullable();
            $table->string('OtherWireless')->nullable();
            $table->string('CardReader')->nullable();
            $table->string('CardReaderType')->nullable();
            $table->string('WCRes')->nullable();
            $table->string('Battery')->nullable();
            $table->string('Software')->nullable();
            $table->string('Model')->nullable();
            $table->string('Color')->nullable();
            $table->string('CPU')->nullable();
            $table->string('GPUChipset')->nullable();
            $table->string('AudioTech')->nullable();
            $table->string('AudioStandard')->nullable();
            $table->string('DisplayConnector')->nullable();
            $table->string('USB')->nullable();
            $table->string('HDMI')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_detail');
    }
}
