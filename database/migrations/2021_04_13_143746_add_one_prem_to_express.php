<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnePremToExpress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('express_quotation', function (Blueprint $table) {
            $table->string('prem_one')->nullable();
            $table->string('prem_fam')->nullable();
            $table->string('limit_sum_one')->nullable();
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
            $table->dropColumn('prem_one');
            $table->dropColumn('prem_fam');
            $table->dropColumn('limit_sum_one');
        });
    }
}
