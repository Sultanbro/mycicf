<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('label');
            $table->integer('parent_id');
            $table->string('url')->nullable();
            $table->string('icon_url')->nullable();
            $table->timestamps();
            $table->longText('description')->nullable();
            $table->longText('documents')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_infos');
    }
}
