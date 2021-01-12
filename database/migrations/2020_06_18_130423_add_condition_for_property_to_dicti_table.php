<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConditionForPropertyToDictiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dicti', function (Blueprint $table) {
            $table->enum('condition_for_property', ['Y', 'N'])->after('parent_name')->default('N');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dicti', function (Blueprint $table) {
            $table->dropColumn('condition_for_property');
        });
    }
}
