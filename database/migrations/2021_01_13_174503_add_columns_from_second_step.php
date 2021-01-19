<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsFromSecondStep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recruitings', function (Blueprint $table) {
            $table->string('candidats_fullname')->nullable();
            $table->integer('candidats_iin')->nullable();
            $table->integer('candidats_phone_number')->nullable();
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
            //
        });
    }
}
