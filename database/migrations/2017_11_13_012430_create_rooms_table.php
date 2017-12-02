<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->integer('id');
            $table->primary('id');
            $table->integer('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->integer('module_id')->unsigned();
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->integer('pact_id');
            $table->foreign('pact_id')->references('id')->on('pacts')->onDelete('cascade');
            $table->integer('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
