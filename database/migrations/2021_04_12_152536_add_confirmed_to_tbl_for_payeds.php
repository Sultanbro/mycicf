<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConfirmedToTblForPayeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_for_payeds', function (Blueprint $table) {
            $table->enum('confirmed', [1, 0])->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_for_payeds', function (Blueprint $table) {
            $table->dropColumn('condirmed');
        });
    }
}
