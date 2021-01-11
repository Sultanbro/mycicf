<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentkoinApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centkoin_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('store_item_id');
            $table->integer('centcoin_history_id');
            $table->integer('user_id');
            $table->text('department');
            $table->text('comment');
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
        Schema::dropIfExists('centkoin_applications');
    }
}
