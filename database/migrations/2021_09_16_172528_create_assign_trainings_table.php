<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_trainings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kias_id');
            $table->date('date_start');
            $table->date('date_end');
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
        Schema::dropIfExists('assign_trainings');
    }
}
