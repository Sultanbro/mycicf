<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitingCandidatsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruiting_candidats_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('candidats_fullname')->nullable();
            $table->integer('candidats_iin')->nullable();
            $table->integer('candidats_phone_number')->nullable();
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
        Schema::dropIfExists('recruiting_candidats_data');
    }
}
