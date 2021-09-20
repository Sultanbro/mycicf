<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('thema');
            $table->integer('user_id');
            $table->text('description');
            $table->dateTime('date_time');
            $table->integer('online');
            $table->integer('space')->nullable();
            $table->string('site')->nullable();
            $table->integer('type');
            $table->timestamps();

            $table->foreign('user_id')->references('kias_id')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
}
