<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModelAndMarkIdAndYear extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kolesa_prices', function (Blueprint $table) {
            $table->string('mark_id');
            $table->string('model_id');
            $table->string('year');
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
            $table->dropColumn('mark_id', 'model_id', 'year');
        });
    }
}
