<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTblForPayeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_for_payeds', function (Blueprint $table) {
            $table->integer('iin_fail')->default(0);
            $table->integer('po_isn')->nullable();
            $table->text('full_data')->nullable();
            $table->integer('client_id')->nullable();
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
            $table->dropColumn('iin_fail');
            $table->dropColumn('po_isn');
            $table->dropColumn('full_data');
            $table->dropColumn('client_id');
        });
    }
}
