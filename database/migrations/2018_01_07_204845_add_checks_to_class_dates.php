<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChecksToClassDates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class_dates', function (Blueprint $table) {
            $table->boolean('check_frequency')->default(false);
            $table->boolean('check_score')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_dates', function (Blueprint $table) {
            $table->dropColumn('check_frequency');
            $table->dropColumn('check_score');
        });
    }
}
