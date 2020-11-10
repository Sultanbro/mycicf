<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionDocumentsToProductsinfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products_infos', function (Blueprint $table) {
            $table->string('description')->nullable();
            $table->string('documents')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products_infos', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('documents');
        });
    }
}
