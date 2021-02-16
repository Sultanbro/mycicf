<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToRecruitingCandidatesDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recruiting_candidates_data', function (Blueprint $table) {
            $table->unsignedBigInteger('recruiting_id')->index();
            $table->foreign('recruiting_id')->references('id')->on('recruitings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recruiting_candidates_data', function (Blueprint $table) {
            $table->dropForeign('recruiting_candidates_data_recruiting_id_foreign');
            $table->dropIndex('recruiting_candidates_data_recruiting_id_index');
            $table->dropColumn('recruiting_id');
        });
    }
}
