<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('doc_no');
            $table->enum('status', ['accepted', 'pending', 'failed']);
            $table->tinyInteger('in_process')->default(0);
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
        Schema::dropIfExists('relogs');
    }
}
