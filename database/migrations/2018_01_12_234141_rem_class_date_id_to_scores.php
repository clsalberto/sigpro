<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemClassDateIdToScores extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('scores', function (Blueprint $table) {
            $table->dropForeign('scores_class_date_id_foreign');
        });

        Schema::table('scores', function (Blueprint $table) {
            $table->dropColumn('class_date_id');
        });

        Schema::table('class_dates', function (Blueprint $table) {
            $table->dropColumn('check_score');
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->boolean('check_score')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
    }
}
