<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInspectionToFullQuotation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('full_quotation', function (Blueprint $table) {
            $table->string('inspection_isn',20)->nullable()->after('calc_da');
            $table->string('inspection_date',10)->nullable()->after('calc_da');
            $table->string('inspection_time',5)->nullable()->after('calc_da');
            $table->string('inspection_address',500)->nullable()->after('calc_da');
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
            $table->dropColumn('inspection_isn');
            $table->dropColumn('inspection_date');
            $table->dropColumn('inspection_time');
            $table->dropColumn('inspection_address');
        });
    }
}
