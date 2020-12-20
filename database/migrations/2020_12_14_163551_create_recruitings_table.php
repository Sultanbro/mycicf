<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unit_structural_name_and_city')->nullable();
            $table->string('name_of_post')->nullable();
            $table->integer('quantity_people')->nullable();
            $table->string('reason_to_recruiting')->nullable();
            $table->string('desired_age')->nullable();
            $table->string('sex')->nullable();
            $table->string('education')->nullable();
            $table->text('functional_responsobilities')->nullable(); /* textarea */
            $table->string('work_expirience')->nullable();
            $table->string('is_he_was_boss')->nullable();
            $table->string('type_of_hire')->nullable();
            $table->text('request_to_candidat')->nullable(); /* textarea */
            $table->string('perspective_to_candidat')->nullable();
            $table->string('computer_knowing')->nullable();
            $table->integer('salary')->nullable();
            $table->string('motivation')->nullable();
            $table->string('job_chart')->nullable();
            $table->string('have_car')->nullable();
            $table->string('driver_category')->nullable();
            $table->text('candidats_trait')->nullable(); /* textarea */
            $table->text('interview_stage')->nullable(); /* textarea */
            $table->text('parent_isn')->nullable(); /* textarea */
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
        Schema::dropIfExists('recruitings');
    }
}
