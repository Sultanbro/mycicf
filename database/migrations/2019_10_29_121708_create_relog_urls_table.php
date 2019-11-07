<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelogUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relog_urls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("url");
            $table->bigInteger('doc_id')->unsigned();
            $table->foreign('doc_id')->references('id')->on('relogs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relog_urls');
    }
}
