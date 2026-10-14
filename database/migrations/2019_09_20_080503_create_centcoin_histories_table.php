<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentcoinHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centcoin_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('description', 1000);
            $table->integer('quantity');
            $table->enum('operation_type', ['add', 'minus']);
            $table->integer('user_isn');
            $table->integer('changed_user_isn');
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
        Schema::dropIfExists('centcoin_histories');
    }
}
