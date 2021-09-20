<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignTrainingsProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_trainings_programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('assign_training_id');
            $table->unsignedBigInteger('training_programs_id');
            $table->timestamps();

            $table->foreign('training_programs_id')->references('id')->on('training_programs')->onDelete('cascade');
            $table->foreign('assign_training_id')->references('id')->on('assign_trainings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_trainings_programs');
    }
}
