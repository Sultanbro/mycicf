<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentcoinAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centcoin_applies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->date('created_apply');
            $table->integer('wasted_centcoins');
            $table->integer('balance');
            $table->string('user_buy_product');
            $table->string('status');
            $table->date('edited_apply');
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
        Schema::dropIfExists('centcoin_applies');
    }
}
