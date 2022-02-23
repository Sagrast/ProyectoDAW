<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientMachineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_machine', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('machine_id');
            $table->date('instalacion');
            $table->date('retirada')->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('machine_id')->references('id')->on('machines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_machine');
    }
}
