<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFullIsnToExpressQuotation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('express_quotation', function (Blueprint $table) {
            $table->string('full_isn',100)->nullable()->after('calc_isn');
            $table->string('full_id',100)->nullable()->after('calc_isn');
            $table->string('full_kias_id',100)->nullable()->after('calc_isn');
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
            $table->dropColumn('full_isn');
            $table->dropColumn('full_id');
            $table->dropColumn('full_kias_id');
        });
    }
}
