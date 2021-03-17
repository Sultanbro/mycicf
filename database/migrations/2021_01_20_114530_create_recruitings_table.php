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
            $table->string('chiefs_duty')->nullable();
            $table->string('chiefs_fullname')->nullable();
            $table->string('unit_structural_name_and_city')->nullable();
            $table->string('name_of_post')->nullable();
            $table->integer('quantity_people')->nullable();
            $table->string('reason_to_recruiting')->nullable();
            $table->string('desired_age')->nullable();
            $table->string('sex')->nullable();
            $table->string('education')->nullable();
            $table->text('functional_responsibilities')->nullable(); /* textarea */
            $table->string('work_experience')->nullable();
            $table->string('is_he_was_boss')->nullable();
            $table->string('type_of_hire')->nullable();
            $table->text('request_to_candidate')->nullable(); /* textarea */
            $table->string('perspective_to_candidate')->nullable();
            $table->string('computer_knowing')->nullable();
            $table->integer('salary')->nullable();
            $table->string('motivation')->nullable();
            $table->string('job_chart')->nullable();
            $table->string('have_car')->nullable();
            $table->string('driver_category')->nullable();
            $table->text('candidates_trait')->nullable(); /* textarea */
            $table->text('interview_stage')->nullable(); /* textarea */
            $table->text('parent_isn')->nullable(); /* textarea */
            $table->date('interview_date')->nullable();
            $table->time('interview_time')->nullable();
            $table->string('interview_result')->nullable();
            $table->date('date_of_internship')->nullable();
            $table->date('date_of_conclusion_dou')->nullable();
            $table->date('date_of_conclusion_td')->nullable();
            $table->text('commentary')->nullable();
            $table->string('application_status')->nullable();
//            $table->string('candidats_fullname')->nullable();
//            $table->integer('candidats_iin')->nullable();
//            $table->integer('candidats_phone_number')->nullable();
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
