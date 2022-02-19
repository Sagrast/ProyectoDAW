<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabelNodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('label_nodo', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger('nodo_id');
            $table->unsignedBigInteger('label_id');
            $table->foreign('nodo_id')->references('id')->on('nodos')->onDelete('cascade');
            $table->foreign('label_id')->references('id')->on('labels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('label_nodo');
    }
}
