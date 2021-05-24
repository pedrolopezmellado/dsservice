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
            $table->string('account');
            $table->float('amount');
            //Inicialmente 0, si se acepta 1, si se rechaza -1
            $table->enum('status',['rejected','inprocess','accepted']);
            $table->string('description');
            $table->string('comentario')->default("");
            $table->float('valoration')->default(0);
            $table->timestamps(); 
            $table->string('user_id');
            $table->foreign('user_id')->references('email')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
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
