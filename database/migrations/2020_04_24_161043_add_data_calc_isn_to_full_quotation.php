<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataCalcIsnToFullQuotation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('full_quotation', function (Blueprint $table) {
            $table->longtext('data')->nullable()->after('sabj_isn');
            $table->string('calc_isn',20)->nullable()->after('sabj_isn');
            $table->string('premiumSum',10)->nullable()->after('sabj_isn');
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
            $table->dropColumn('data');
            $table->dropColumn('calc_isn');
            $table->dropColumn('premiumSum');
        });
    }
}
