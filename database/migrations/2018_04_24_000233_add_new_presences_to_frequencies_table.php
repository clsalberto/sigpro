<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewPresencesToFrequenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('frequencies', function (Blueprint $table) {
            $table->boolean('presence_e')->default(false);
            $table->boolean('presence_f')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('frequencies', function (Blueprint $table) {
            $table->dropColumn('presence_e');
            $table->dropColumn('presence_f');
        });
    }
}
