<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permission', function (Blueprint $table) {
            $table->integer('RoleId')->unsigned();
            $table->foreign('RoleId')->references('RoleId')->on('role')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('PermissionId')->unsigned();
            $table->foreign('PermissionId')->references('PermissionId')->on('permission');
            $table->primary(['RoleId','PermissionId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('role_permission');
    }
}
