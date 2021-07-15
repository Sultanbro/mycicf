<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOracleIdToParseOraclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parse_oracles', function (Blueprint $table) {
            $table->integer('oracle_id')->after('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parse_oracles', function (Blueprint $table) {
            $table->dropColumn('oracle_id');
        });
    }
}
