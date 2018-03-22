<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPresencesToFrequenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('frequencies', function (Blueprint $table) {
            $table->dropColumn('presence');
            $table->boolean('presence_a')->default(false);
            $table->boolean('presence_b')->default(false);
            $table->boolean('presence_c')->default(false);
            $table->boolean('presence_d')->default(false);
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
            $table->dropColumn('presence_a');
            $table->dropColumn('presence_b');
            $table->dropColumn('presence_c');
            $table->dropColumn('presence_d');
            $table->boolean('presence')->default(false);
        });
    }
}
