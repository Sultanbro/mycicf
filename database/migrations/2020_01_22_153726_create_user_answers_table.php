<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('question_id')->index();
            $table->unsignedBigInteger('answer_id')->index();
            $table->integer('user_isn')->index();
            $table->timestamps();
        });

        Schema::table('user_answers', function (Blueprint $table){
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('answer_id')->references('id')->on('answers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_answers', function (Blueprint $table){
            $table->dropForeign('user_answers_answer_id_foreign');
            $table->dropForeign('user_answers_question_id_foreign');
            $table->dropIndex('user_answers_question_id_index');
            $table->dropIndex('user_answers_answer_id_index');
        });
        Schema::dropIfExists('user_answers');
    }
}
