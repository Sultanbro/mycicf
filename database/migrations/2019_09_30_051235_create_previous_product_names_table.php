<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreviousProductNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previous_product_names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id');
            $table->string('name', 55);
            $table->timestamps();

            $table->index('product_id');
            $table->index('name');
            $table->index('created_at');
            $table->index('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('previous_product_names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id');
            $table->string('name', 55);
            $table->timestamps();

            $table->dropIndex('product_id');
            $table->dropIndex('name');
            $table->dropIndex('created_at');
            $table->dropIndex('updated_at');
        });
        Schema::dropIfExists('previous_product_names');
    }
}
