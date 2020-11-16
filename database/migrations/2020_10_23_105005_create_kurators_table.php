<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuratorsTable extends Migration
{
    /**
     * Run the migrations.
     *fa
     * @return void
     */
    public function up()
    {
        Schema::create('kurators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_isn');
            $table->integer('dept_isn');
            $table->string('type');
            $table->integer('changer');
            $table->tinyInteger('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kurators');
    }
}
