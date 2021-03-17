<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitingCandidatesDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruiting_candidates_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('candidate_fullname')->nullable();
            $table->string('candidate_iin')->nullable();
            $table->string('candidate_phone_number')->nullable();
            $table->string('responsible_recruiter')->nullable();
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
        Schema::dropIfExists('recruiting_candidates_data');
    }
}
