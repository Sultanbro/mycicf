<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->dateTime('to')->after('data')->nullable();
            $table->dateTime('from')->after('to')->nullable();
            $table->string('title')->after('from')->nullable();
            $table->string('office')->after('title')->nullable();
            $table->text('description')->after('office')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->dropColumn('to');
            $table->dropColumn('from');
            $table->dropColumn('title');
            $table->dropColumn('office');
            $table->dropColumn('description');
        });
    }
}
