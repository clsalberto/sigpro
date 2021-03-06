<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPunctuationsToScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scores', function (Blueprint $table) {
            $table->dropColumn('punctuation');
            $table->integer('punctuation_a')->nullable()->default(null);
            $table->integer('punctuation_b')->nullable()->default(null);
            $table->integer('punctuation_c')->nullable()->default(null);
            $table->integer('punctuation_d')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scores', function (Blueprint $table) {
            $table->dropColumn('punctuation_a');
            $table->dropColumn('punctuation_b');
            $table->dropColumn('punctuation_c');
            $table->dropColumn('punctuation_d');
            $table->integer('punctuation')->default(0);
        });
    }
}
