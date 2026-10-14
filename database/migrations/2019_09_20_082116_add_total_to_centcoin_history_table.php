<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTotalToCentcoinHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('centcoin_histories', function (Blueprint $table) {
            $table->integer('total')->after('operation_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('centcoin_histories', function (Blueprint $table) {
            $table->dropColumn('total');
        });
    }
}
