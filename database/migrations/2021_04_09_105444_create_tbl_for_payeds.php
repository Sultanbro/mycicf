<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblForPayeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_for_payeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('isn')->nullable();
            $table->string('plea')->nullable();
            $table->string('iin')->nullable();
            $table->string('name')->nullable();
            $table->date('date_sign')->nullable();
            $table->enum('signed', [1, 0])->default('0');
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
        Schema::dropIfExists('tbl_for_payeds');
    }
}
