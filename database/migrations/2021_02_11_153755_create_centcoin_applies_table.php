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
            $table->bigIncrements('id')->nullable();
            $table->string('full_name')->nullable();
            $table->date('created_apply')->nullable();
            $table->integer('wasted_centcoins')->nullable();
            $table->integer('balance');
            $table->string('user_buy_product')->nullable();
            $table->string('status')->nullable();
            $table->date('edited_apply')->nullable();
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
