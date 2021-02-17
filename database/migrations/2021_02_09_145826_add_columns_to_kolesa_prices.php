<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToKolesaPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kolesa_prices', function (Blueprint $table) {
            $table->integer('ofprice')->index()->nullable();
            $table->string('city')->index()->nullable();
            $table->string('body')->nullable();
            $table->string('volume')->nullable();
            $table->string('transmission')->nullable();
            $table->string('wheel')->nullable();
            $table->string('color')->nullable();
            $table->string('drive')->nullable();
            $table->string('inkz')->nullable();
            $table->string('vin')->nullable();
            $table->string('milage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kolesa_prices', function (Blueprint $table) {
            $table->dropIndex('kolesa_prices_ofprice_index');
            $table->dropIndex('kolesa_prices_city_index');
        });
        Schema::dropIfExists('kolesa_prices');
    }
}
