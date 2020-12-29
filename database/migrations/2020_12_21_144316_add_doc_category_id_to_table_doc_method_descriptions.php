<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDocCategoryIdToTableDocMethodDescriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doc_method_descriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('doc_category_id')->index();
            $table->foreign('doc_category_id')->references('id')->on('doc_method_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doc_method_descriptions', function (Blueprint $table) {
            $table->dropForeign('doc_method_descriptions_doc_category_id_foreign');
            $table->dropIndex('doc_method_descriptions_doc_category_id_index');
            $table->dropColumn('doc_category_id');
        });
    }
}
