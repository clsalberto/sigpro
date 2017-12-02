<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_date_id')->unsigned();
            $table->foreign('class_date_id')->references('id')->on('class_dates')->onDelete('cascade');
            $table->integer('registration_id')->unsigned();
            $table->foreign('registration_id')->references('id')->on('registrations')->onDelete('cascade');
            $table->integer('punctuation')->default(0);
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
        Schema::dropIfExists('scores');
    }
}
