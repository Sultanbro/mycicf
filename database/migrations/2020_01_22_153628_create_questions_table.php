<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question');
            $table->unsignedBigInteger('post_id')->index();
            $table->timestamps();
            $table->foreign('post_id')->references('id')->on('posts');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table){
            $table->dropForeign('questions_post_id_foreign');
            $table->dropIndex('questions_post_id_index');
        });
        Schema::dropIfExists('questions');
    }
}
