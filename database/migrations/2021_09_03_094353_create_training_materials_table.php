<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('training_program_id');
            $table->unsignedBigInteger('educational_material_id');
            $table->timestamps();

            $table->unique(['training_program_id', 'educational_material_id'], 'train_mat_id');
            $table->foreign('training_program_id')->references('id')->on('training_programs')->onDelete('cascade');
            $table->foreign('educational_material_id')->references('id')->on('educational_materials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_materials');
    }
}
