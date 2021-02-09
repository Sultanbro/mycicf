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
            $table->integer('body')->nullable();
            $table->string('volume')->nullable();
            $table->date('transmission')->nullable();
            $table->integer('wheel')->nullable();
            $table->integer('color')->nullable();
            $table->string('drive')->nullable();
            $table->integer('inkz')->nullable();
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
