<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJustificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('justifications', function (Blueprint $table) {
            $table->integer('frequency_id')->unsigned();
            $table->text('comments');
            $table->string('document')->nulable();
            $table->timestamps();

            $table->foreign('frequency_id')
                ->references('id')
                ->on('frequencies')
                ->onDelete('cascade');

            $table->primary('frequency_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('justifications');
    }
}
