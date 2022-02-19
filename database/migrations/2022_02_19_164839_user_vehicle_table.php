<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
        $table->timestamps();
        $table->unsignedBigInteger('users_id');
        $table->unsignedBigInteger('vehicles_id');
        $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('vehicles_id')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
