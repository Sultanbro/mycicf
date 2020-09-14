<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnRequestIdExpressQuotation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('express_quotation', function ($table) {
            DB::statement('ALTER TABLE express_quotation MODIFY COLUMN nshb_request_id INT(11)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('express_quotation', function (Blueprint $table) {
//
//        });
    }
}
