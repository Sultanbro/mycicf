<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLanguagesToRecruitingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recruitings', function (Blueprint $table) {
            $table->string('languages')->nullable();
            $table->string('social_packets')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recruitings', function (Blueprint $table) {
            $table->dropColumn('languages');
            $table->dropColumn('social_packets');
        });
    }
}
