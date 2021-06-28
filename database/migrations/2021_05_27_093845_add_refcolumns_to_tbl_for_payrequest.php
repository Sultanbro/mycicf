<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRefcolumnsToTblForPayrequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_for_payrequest', function (Blueprint $table) {
            $table->string('refundisn')->nullable();
            $table->string('refundid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_for_payrequest', function (Blueprint $table) {
            $table->dropColumn('refundisn');
            $table->dropColumn('refundid');
        });
    }
}
