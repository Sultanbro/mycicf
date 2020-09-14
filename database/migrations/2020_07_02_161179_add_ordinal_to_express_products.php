<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrdinalToExpressProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('express_products', function (Blueprint $table) {
            $table->integer('ordinal')->default(0)->after('product_isn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('express_products', function (Blueprint $table) {
            $table->dropColumn('ordinal');
        });
    }
}
