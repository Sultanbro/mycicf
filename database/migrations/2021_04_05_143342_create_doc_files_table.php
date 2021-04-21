<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_info_id');
            $table->text('docfile')->nullable();
            $table->text('profile')->nullable();
            $table->foreign('product_info_id')->references('id')->on('products_infos');
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
        Schema::dropIfExists('doc_files');
    }
}
