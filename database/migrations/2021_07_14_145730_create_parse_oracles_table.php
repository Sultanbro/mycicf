<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParseOraclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    protected $connection = 'oracle';

    public function up()
    {
        Schema::create('parse_oracles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('CurrCode');
            $table->integer('AmountP');
            $table->integer('DSD');
            $table->string('rating');
            $table->integer('DeptISN');
            $table->string('DeptName');
            $table->string('group_name');
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
        Schema::dropIfExists('parse_oracles');
    }
}
