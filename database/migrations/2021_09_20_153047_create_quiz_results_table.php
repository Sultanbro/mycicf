<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('score')->default(0);
            $table->unsignedBigInteger('training_programs_id');
            $table->unsignedBigInteger('assign_training_id');
            $table->unsignedBigInteger('quiz_id');
            $table->integer('used_try')->default(0);
            $table->integer('all_try');
            $table->timestamps();

            $table->foreign('training_programs_id')->references('id')->on('training_programs');
            $table->foreign('assign_training_id')->references('id')->on('assign_trainings');
            $table->foreign('user_id')->references('kias_id')->on('branches')->onDelete('cascade');
            $table->foreign('quiz_id')->references('id')->on('quizzes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_results');
    }
}
