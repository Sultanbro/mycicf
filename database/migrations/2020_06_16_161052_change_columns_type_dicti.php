<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsTypeDicti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dicti', function ($table) {
            DB::statement('ALTER TABLE dicti MODIFY COLUMN isn BIGINT(30)');
            DB::statement('ALTER TABLE dicti MODIFY COLUMN parent_isn BIGINT(30)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('dicti', function (Blueprint $table) {
//            $table->dropColumn('isn');
//            $table->dropColumn('parent_isn');
//        });
    }
}
