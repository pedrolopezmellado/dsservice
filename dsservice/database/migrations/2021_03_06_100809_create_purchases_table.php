<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('datos_bancarios');
            $table->integer('importe');
            $table->integer('aceptada');
            $table->string('descripcion');
            $table->timestamps(); 
            $table->string('user_id');
            $table->foreign('user_id')->references('email')->on('users');
            $table->string('servicio_id');
            $table->foreign('servicio_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
