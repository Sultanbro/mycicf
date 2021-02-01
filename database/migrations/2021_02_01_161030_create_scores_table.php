<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_isn')->index()->comment('Id которого лайкнули');
            $table->enum('type',['like','dislike'])->index()->comment('Тип лайк или дизлайк');
            $table->integer('scored_user_isn')->comment('Кто лайкнул');
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
        Schema::table('scores',function (Blueprint $table){
            $table->dropIndex('scores_user_isn_index');
            $table->dropIndex('scores_type_index');
        });
        Schema::dropIfExists('scores');
    }
}
