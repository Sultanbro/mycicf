<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKiasIdToFullQuotation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('full_quotation', function (Blueprint $table) {
            $table->string('kias_id',20)->nullable()->after('contract_number');
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
            $table->dropColumn('kias_id');
        });
    }
}
