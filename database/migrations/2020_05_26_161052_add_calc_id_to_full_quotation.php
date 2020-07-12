<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCalcIdToFullQuotation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('full_quotation', function (Blueprint $table) {
            $table->string('calc_id',100)->nullable()->after('calc_isn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('full_quotation', function (Blueprint $table) {
            $table->dropColumn('calc_id');
        });
    }
}
