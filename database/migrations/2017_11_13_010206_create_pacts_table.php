<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacts', function (Blueprint $table) {
            $table->integer('id');
            $table->primary('id');
            $table->integer('modality_id');
            $table->foreign('modality_id')->references('id')->on('modalities')->onDelete('cascade');
            $table->integer('year');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('pacts');
    }
}
