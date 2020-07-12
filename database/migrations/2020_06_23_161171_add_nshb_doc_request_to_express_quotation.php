<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNshbDocRequestToExpressQuotation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('express_quotation', function (Blueprint $table) {
            $table->string('nshb_status_name',20)->nullable()->after('nshb');
            $table->string('nshb_status',10)->nullable()->after('nshb');
            $table->string('nshb_request',50)->nullable()->after('nshb');
            $table->string('nshb_doc',50)->nullable()->after('nshb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('express_quotation', function (Blueprint $table) {
            $table->dropColumn('nshb_status_name');
            $table->dropColumn('nshb_status');
            $table->dropColumn('nshb_request');
            $table->dropColumn('nshb_doc');
        });
    }
}
