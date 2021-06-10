<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAttachment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_attachment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filename')->default('')->length(100);
            $table->string('filename_hash')->default('')->length(100);
            $table->string('type');
            $table->timestamps();
            $table->integer('create_time');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_attachment');
    }
}
