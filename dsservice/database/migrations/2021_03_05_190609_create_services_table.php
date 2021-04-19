<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('direction');
            $table->float('valoration');
            $table->string('description');
            $table->string('range_price');
            $table->timestamps();
            $table->string('user_id');
            $table->foreign('user_id')->references('email')->on('users')->onDelete('cascade');
            $table->string('category_id');
            $table->foreign('category_id')->references('name')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
